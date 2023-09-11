<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Sponsor;
use App\Modules\Admin\Requests\SponsorRequest;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class SponsorController extends Controller
{

    /**
     * @return bool
     */
    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }


    /**
     * @return bool
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    protected $sponsor_image_path;
    protected $sponsor_image_relative_path;



    /**
     * menu constructor.
     */
    public function __construct()
    {

        $this->sponsor_image_path = public_path('uploads/sponsor');
        $this->sponsor_image_relative_path = '/uploads/sponsor';
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $pageTitle = "List of  Sponsor";
        // Get Parent user data
        $data = Sponsor::where('status', 'active')->paginate(30);
        // return view
        return view("Admin::sponsor.index", compact('data', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Sponsor";
        // return View
        return view("Admin::sponsor.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponsorRequest $request)
    {
        // Get all input data
        $input = $request->all();
        // dd($input);
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not

        // Image link 
        $sponsor_image = $request->file('image_link');

        if ($sponsor_image) {
            $sponsor_image_title = str_replace(' ', '-', $input['email'] . '.' . $sponsor_image->getClientOriginalExtension());
            $sponsor_image_link = $this->sponsor_image_relative_path . '/' . $sponsor_image_title;
        } else {
            $sponsor_image_link = '';
            $sponsor_image_title = '';
        }

        $input['image_link'] = $sponsor_image_title;
        // $input['type'] = $request->file('image_link');

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            // Store user data 
            if ($sponsor_data = Sponsor::create($input)) {
                // Store category image
                if ($sponsor_image != null) {
                    $sponsor_image->move($this->sponsor_image_path, $sponsor_image_title);
                }
            }

            DB::commit();
            Session::flash('message', 'Sponsor is added!');
            return redirect(config('global.prefix_name') . '/sponsor/index');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'View Sponsor Informations';

        // Find menu data
        $data = Sponsor::where('id', $id)->first();

        if (!empty($data)) {
            // If found menu
            return view("Admin::sponsor.show", compact('data', 'pageTitle'));
        } else {
            // If Client not found
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = "Update Sponsor";
        // Find menu
        $data = Sponsor::where('id', $id)->first();
        // If Client not found                
        if (empty($data)) {
            Session::flash('danger', 'Sponsor not found.');
            return redirect()->route('admin.sponsor.index');
        }
        // Return view
        return view("Admin::sponsor.edit", compact('data', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SponsorRequest  $request, $id)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['slug']); #make slug for menu
        // Check already presents or not
        // Find menu
        $model = Sponsor::where('id', $id)->first();

        // Image file 
        $sponsor_image = $request->file('image_link');

        if ($sponsor_image) {
            $sponsor_image_title = str_replace(' ', '-', $input['email'] . '.' . $sponsor_image->getClientOriginalExtension());
            $sponsor_image_link = $this->sponsor_image_relative_path . '/' . $sponsor_image_title;
        } else {
            $sponsor_image_link = $model->image_link;
            $sponsor_image_title = $model->image_link;
        }

        $input['image_link'] = $sponsor_image_title;


        DB::beginTransaction();
        try {
            // Update menu
            $result = $model->update($input);

            if ($result) {

                if ($sponsor_image != null) {
                    File::Delete($model->image_link);
                    $sponsor_image->move($this->sponsor_image_path, $sponsor_image_title);
                }
                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect(config('global.prefix_name') . '/sponsor/index');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find menu 
        $model = Sponsor::where('sponsor.id', $id)
            ->select('sponsor.*')
            ->first();
        DB::beginTransaction();
        try {
            $imagePath = $this->sponsor_image_path . '/' . $model->image_link;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $model = $model->delete();
            DB::commit();
            Session::flash('message', "Successfully Deleted.");
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }
        // redirect to current page
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $pageTitle = 'Sponsor Information';
        // User model initialize
        $model = new Sponsor();
        if ($this->isGetRequest()) {
            // Search data found
            $search_keywords = trim(Input::get('search_keywords'));
            $model = $model->where(function ($query) use ($search_keywords) {
                $query = $query->orWhere('name', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('email', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('phone', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('designation', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('education', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('status', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('slug', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('description', 'LIKE', '%' . $search_keywords . '%');
            });
            $data = $model->where('status', 'active')->select('sponsor.*')->paginate(30);
        } else {

            // If get data not found
            $data = Sponsor::where('status', 'active')->paginate(30);
        }

        // Return view
        return view("Admin::sponsor.index", compact('data', 'pageTitle'));
    }
}
