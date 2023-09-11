<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Team;
use App\Modules\Admin\Requests\TeamRequest;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class TeamController extends Controller
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

    protected $team_image_path;
    protected $team_image_relative_path;



    /**
     * menu constructor.
     */
    public function __construct()
    {

        $this->team_image_path = public_path('uploads/team');
        $this->team_image_relative_path = '/uploads/team';
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $pageTitle = "List of  Team";
        // Get Parent user data
        $data = Team::where('status', 'active')->paginate(30);
        // return view
        return view("Admin::team.index", compact('data', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Team";
        // return View
        return view("Admin::team.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        // Get all input data
        $input = $request->all();
        // dd($input);
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not

        // Image link 
        $team_image = $request->file('image_link');

        if ($team_image) {
            $team_image_title = str_replace(' ', '-', $input['slug'] . '.' . $team_image->getClientOriginalExtension());
            $team_image_link = $this->team_image_relative_path . '/' . $team_image_title;
        } else {
            $team_image_link = '';
            $team_image_title = '';
        }

        $input['image_link'] = $team_image_title;
        // $input['type'] = $request->file('image_link');

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            // Store user data 
            if ($team_data = Team::create($input)) {
                // Store category image
                if ($team_image != null) {
                    $team_image->move($this->team_image_path, $team_image_title);
                }
            }

            DB::commit();
            Session::flash('message', 'Team is added!');
            return redirect(config('global.prefix_name') . '/team/index');
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
        $pageTitle = 'View Team Informations';

        // Find menu data
        $data = Team::where('id', $id)->first();

        if (!empty($data)) {
            // If found menu
            return view("Admin::team.show", compact('data', 'pageTitle'));
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
        $pageTitle = "Update Team";
        // Find menu
        $data = Team::where('id', $id)->first();
        // If Client not found                
        if (empty($data)) {
            Session::flash('danger', 'Team not found.');
            return redirect()->route('admin.team.index');
        }
        // Return view
        return view("Admin::team.edit", compact('data', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest  $request, $id)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['slug']); #make slug for menu
        // Check already presents or not
        // Find menu
        $model = Team::where('id', $id)->first();

        // Image file 
        $team_image = $request->file('image_link');

        if ($team_image) {
            $team_image_title = str_replace(' ', '-', $input['slug'] . '.' . $team_image->getClientOriginalExtension());
            $team_image_link = $this->team_image_relative_path . '/' . $team_image_title;
        } else {
            $team_image_link = $model->image_link;
            $team_image_title = $model->image_link;
        }

        $input['image_link'] = $team_image_title;


        DB::beginTransaction();
        try {
            // Update menu
            $result = $model->update($input);

            if ($result) {

                if ($team_image != null) {
                    File::Delete($model->image_link);
                    $team_image->move($this->team_image_path, $team_image_title);
                }
                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect(config('global.prefix_name') . '/team/index');
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
        $model = Team::where('team.id', $id)
            ->select('team.*')
            ->first();
        DB::beginTransaction();
        try {
            $imagePath = $this->team_image_path . '/' . $model->image_link;
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
        $pageTitle = 'Team Information';
        // User model initialize
        $model = new Team();
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
            $data = $model->where('status', 'active')->select('team.*')->paginate(30);
        } else {

            // If get data not found
            $data = Team::where('status', 'active')->paginate(30);
        }

        // Return view
        return view("Admin::team.index", compact('data', 'pageTitle'));
    }
}
