<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Location;
use App\Modules\Admin\Requests;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class LocationController extends Controller
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

    protected $location_image_path;
    protected $location_image_relative_path;



    /**
     * menu constructor.
     */
    public function __construct()
    {

        $this->location_image_path = public_path('uploads/location');
        $this->location_image_relative_path = '/uploads/location';
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $pageTitle = "List of  Location";
        // Get Parent user data
        $data = Location::where('status', 'active')->paginate(30);
        // return view
        return view("Admin::location.index", compact('data', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Location";
        // return View
        return view("Admin::location.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\LocationRequest $request)
    {
        // Get all input data
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not

        // Image link 
        $location_image = $request->file('image_link');

        if ($location_image) {
            $location_image_title = str_replace(' ', '-', $input['email'] . '.' . $location_image->getClientOriginalExtension());
            $location_image_link = $this->location_image_relative_path . '/' . $location_image_title;
        } else {
            $location_image_link = '';
            $location_image_title = '';
        }

        $input['image_link'] = $location_image_title;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            // Store user data 
            if ($location_data = Location::create($input)) {
                // Store category image
                if ($location_image != null) {
                    $location_image->move($this->location_image_path, $location_image_title);
                }
            }

            DB::commit();
            Session::flash('message', 'Location is added!');
            return redirect(config('global.prefix_name') . '/location/index');
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
        $pageTitle = 'View Location Informations';

        // Find menu data
        $data = Location::where('id', $id)->first();

        if (!empty($data)) {
            // If found menu
            return view("Admin::location.show", compact('data', 'pageTitle'));
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
        $pageTitle = "Update Location";
        // Find menu
        $data = Location::where('id', $id)->first();
        // If Client not found                
        if (empty($data)) {
            Session::flash('danger', 'Location not found.');
            return redirect()->route('admin.location.index');
        }
        // Return view
        return view("Admin::location.edit", compact('data', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\LocationRequest  $request, $id)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['slug']); #make slug for menu
        // Check already presents or not
        // Find menu
        $model = Location::where('id', $id)->first();

        // Image file 
        $location_image = $request->file('image_link');

        if ($location_image) {
            $location_image_title = str_replace(' ', '-', $input['email'] . '.' . $location_image->getClientOriginalExtension());
            $location_image_link = $this->location_image_relative_path . '/' . $location_image_title;
        } else {
            $location_image_link = $model->image_link;
            $location_image_title = $model->image_link;
        }

        $input['image_link'] = $location_image_title;


        DB::beginTransaction();
        try {
            // Update menu
            $result = $model->update($input);

            if ($result) {

                if ($location_image != null) {
                    File::Delete($model->image_link);
                    $location_image->move($this->location_image_path, $location_image_title);
                }
                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect(config('global.prefix_name') . '/location/index');
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
        $model = Location::where('location.id', $id)
            ->select('location.*')
            ->first();
        DB::beginTransaction();
        try {
            $imagePath = $this->location_image_path . '/' . $model->image_link;
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
        $pageTitle = 'Location Information';
        // User model initialize
        $model = new Location();
        if ($this->isGetRequest()) {
            // Search data found
            $search_keywords = trim(Input::get('search_keywords'));
            $model = $model->where(function ($query) use ($search_keywords) {
                $query = $query->orWhere('name', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('slug', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('description', 'LIKE', '%' . $search_keywords . '%');
            });
            $data = $model->where('status', 'active')->select('location.*')->paginate(30);
        } else {

            // If get data not found
            $data = Location::where('status', 'active')->paginate(30);
        }

        // Return view
        return view("Admin::location.index", compact('data', 'pageTitle'));
    }
}
