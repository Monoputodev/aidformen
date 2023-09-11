<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\NoticeCareer;
use App\Modules\Admin\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use File;
use App;

class NoticeController extends Controller
{

     /**
     * @return bool
     */
    protected function isGetRequest(){
        return Input::server("REQUEST_METHOD") == "GET";
    }


    /**
     * @return bool
     */
    protected function isPostRequest(){
        return Input::server("REQUEST_METHOD") == "POST";
    }

    protected $notice_image_path;
    protected $notice_image_relative_path;



    /**
     * menu constructor.
     */
    public function __construct()
    {

        $this->notice_image_path = public_path('uploads/notice');
        $this->notice_image_relative_path = '/uploads/notice';

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   

        $pageTitle = "List of  NoticeCareer";
        // Get Parent user data
        $data = NoticeCareer::where('status','active')->paginate(30);;
        // return view
        return view("Admin::notice.index", compact('data','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Clients";
        // return View
        return view("Admin::notice.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\NoticeRequest $request)
    {
        // Get all input data
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not
      
            // Image link 
            $notice_image = $request->file('image_link');

            if($notice_image) {
                $notice_image_title = str_replace(' ', '-', $input['slug'] . '.' . $notice_image->getClientOriginalExtension());
                $notice_image_link = $this->notice_image_relative_path.'/'.$notice_image_title;

            }else{
                $notice_image_link = '';
                $notice_image_title = '';
            }

            $input['image_link'] = $notice_image_title;

            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store user data 
                if($client_data = NoticeCareer::create($input))
                {
                    // Store category image
                    if($notice_image != null){
                        $notice_image->move($this->notice_image_path, $notice_image_title);
                    }
                }

                DB::commit();
                Session::flash('message', 'Notice & Career is added!');
                return redirect(config('global.prefix_name').'/notice/index');
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
        $pageTitle = 'View Clients Informations';

        // Find menu data
        $data = NoticeCareer::where('notice_career.id', $id)
                ->select('notice_career.*')
                ->first();                    

        if(!empty($data))
        {
            // If found menu
            return view("Admin::notice.show", compact('data','pageTitle'));

        }else{
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
       $pageTitle = "Update Clients";
        // Find menu
        $data = NoticeCareer::where('notice_career.id', $id)
                        ->select('notice_career.*')
                        ->first();
        // If Client not found                
        if(empty($data)){
            Session::flash('danger', 'Client not found.');
            return redirect()->route('admin.notice_career.index');
        }
        // Return view
        return view("Admin::notice.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\NoticeRequest  $request, $id)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['slug']); #make slug for menu
        // Check already presents or not
        // Find menu
        $model = NoticeCareer::where('notice_career.id', $id)
            ->select('notice_career.*')
            ->first();

        // Image file 
        $notice_image = $request->file('image_link');

        if($notice_image) {
            $notice_image_title = str_replace(' ', '-', $input['slug'] . '.' . $notice_image->getClientOriginalExtension());
            $notice_image_link = $this->notice_image_relative_path.'/'.$notice_image_title;
        }else{
            $notice_image_link = $model->image_link;
            $notice_image_title = $model->image_link;
        }

        $input['image_link'] = $notice_image_title;


        DB::beginTransaction();
        try {
            // Update menu
            $result = $model->update($input);

            if($result){

                if($notice_image != null){
                    File::Delete($model->image_link);
                    $notice_image->move($this->notice_image_path, $notice_image_title);
                }
                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect(config('global.prefix_name').'/notice/index');
        }
        catch (\Exception $e) {
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
        $model =NoticeCareer::where('notice_career.id', $id) 
            ->select('notice_career.*')
            ->first();
        DB::beginTransaction();
        try {
           $imagePath = $this->notice_image_path.'/'.$model->image_link;
            if(file_exists($imagePath)){
                unlink($imagePath);   
            }
            
            $model= $model->delete();
            
                DB::commit();
                
            Session::flash('message', "Successfully Deleted.");
            
        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        // redirect to current page
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $pageTitle = 'Client Information';
        // User model initialize
        $model = new NoticeCareer();
        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim(Input::get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('status', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('slug', 'LIKE', '%'.$search_keywords.'%');
                  
                    $query = $query->orWhere('description', 'LIKE', '%'.$search_keywords.'%');
                });
            $data = $model->where('status','active')->select('notice_career.*')->paginate(30);
        }else{

            // If get data not found
            $data = NoticeCareer::where('status','active')->paginate(30);
        }

        // Return view
        return view("Admin::notice.index", compact('data','pageTitle'));

    }
}
