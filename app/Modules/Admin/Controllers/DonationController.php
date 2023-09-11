<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Donation;
use App\Modules\Admin\Requests;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class DonationController extends Controller
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

    protected $donation_image_path;
    protected $donation_image_relative_path;



    /**
     * menu constructor.
     */
    public function __construct()
    {

        $this->donation_image_path = public_path('uploads/donation');
        $this->donation_image_relative_path = '/uploads/donation';
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $pageTitle = "List of  Donation";
        // Get Parent user data
        $data = Donation::where('status', 'active')->paginate(30);
        // return view
        return view("Admin::donation.index", compact('data', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Donation";
        // return View
        return view("Admin::donation.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\DonationRequest $request)
    {
        // Get all input data
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not

        // Image link 
        $donation_image = $request->file('image_link');

        if ($donation_image) {
            $donation_image_title = str_replace(' ', '-', $input['email'] . '.' . $donation_image->getClientOriginalExtension());
            $donation_image_link = $this->donation_image_relative_path . '/' . $donation_image_title;
        } else {
            $donation_image_link = '';
            $donation_image_title = '';
        }

        $input['image_link'] = $donation_image_title;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            // Store user data 
            if ($donation_data = Donation::create($input)) {
                // Store category image
                if ($donation_image != null) {
                    $donation_image->move($this->donation_image_path, $donation_image_title);
                }
            }

            DB::commit();
            Session::flash('message', 'Donation is added!');
            return redirect(config('global.prefix_name') . '/donation/index');
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
        $pageTitle = 'View Donation Informations';

        // Find menu data
        $data = Donation::where('id', $id)->first();

        if (!empty($data)) {
            // If found menu
            return view("Admin::donation.show", compact('data', 'pageTitle'));
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
        $pageTitle = "Update Donation";
        // Find menu
        $data = Donation::where('id', $id)->first();
        // If Client not found                
        if (empty($data)) {
            Session::flash('danger', 'Donation not found.');
            return redirect()->route('admin.donation.index');
        }
        // Return view
        return view("Admin::donation.edit", compact('data', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\DonationRequest  $request, $id)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['slug']); #make slug for menu
        // Check already presents or not
        // Find menu
        $model = Donation::where('id', $id)->first();

        // Image file 
        $donation_image = $request->file('image_link');

        if ($donation_image) {
            $donation_image_title = str_replace(' ', '-', $input['email'] . '.' . $donation_image->getClientOriginalExtension());
            $donation_image_link = $this->donation_image_relative_path . '/' . $donation_image_title;
        } else {
            $donation_image_link = $model->image_link;
            $donation_image_title = $model->image_link;
        }

        $input['image_link'] = $donation_image_title;


        DB::beginTransaction();
        try {
            // Update menu
            $result = $model->update($input);

            if ($result) {

                if ($donation_image != null) {
                    File::Delete($model->image_link);
                    $donation_image->move($this->donation_image_path, $donation_image_title);
                }
                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect(config('global.prefix_name') . '/donation/index');
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
        $model = Donation::where('donation.id', $id)
            ->select('donation.*')
            ->first();
        DB::beginTransaction();
        try {
            $imagePath = $this->donation_image_path . '/' . $model->image_link;
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
        $pageTitle = 'Donation Information';
        // User model initialize
        $model = new Donation();
        if ($this->isGetRequest()) {
            // Search data found
            $search_keywords = trim(Input::get('search_keywords'));
            $model = $model->where(function ($query) use ($search_keywords) {
                $query = $query->orWhere('name', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('slug', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('description', 'LIKE', '%' . $search_keywords . '%');
            });
            $data = $model->where('status', 'active')->select('donation.*')->paginate(30);
        } else {

            // If get data not found
            $data = Donation::where('status', 'active')->paginate(30);
        }

        // Return view
        return view("Admin::donation.index", compact('data', 'pageTitle'));
    }
}
