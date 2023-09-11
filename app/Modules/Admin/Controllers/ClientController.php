<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Client;
use App\Modules\Admin\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use Image;
use File;
use App;

class ClientController extends Controller
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

    protected $client_image_path;
    protected $client_image_relative_path;



    /**
     * menu constructor.
     */
    public function __construct()
    {

        $this->client_image_path = public_path('uploads/client');
        $this->client_image_relative_path = '/uploads/client';

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   

        $pageTitle = "List of  Clients";
        // Get Parent user data
        $data = Client::where('status','active')->paginate(30);;
        // return view
        return view("Admin::client.index", compact('data','pageTitle'));
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
        return view("Admin::client.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ClientRequest $request)
    {
        // Get all input data
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not
      
            // Image link 
            $client_image = $request->file('image_link');

            if($client_image) {
                $client_image_title = str_replace(' ', '-', $input['slug'] . '.' . $client_image->getClientOriginalExtension());
                $client_image_link = $this->client_image_relative_path.'/'.$client_image_title;

            }else{
                $client_image_link = '';
                $client_image_title = '';
            }

            $input['image_link'] = $client_image_title;

            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store user data 
                if($client_data = Client::create($input))
                {
                    // Store category image
                    if($client_image != null){
                        $client_image->move($this->client_image_path, $client_image_title);
                    }
                }

                DB::commit();
                Session::flash('message', 'Clients is added!');
                return redirect(config('global.prefix_name').'/client/index');
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
        $data = Client::where('clients.id', $id)
                ->select('clients.*')
                ->first();                    

        if(!empty($data))
        {
            // If found menu
            return view("Admin::client.show", compact('data','pageTitle'));

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
        $data = Client::where('clients.id', $id)
                        ->select('clients.*')
                        ->first();
        // If Client not found                
        if(empty($data)){
            Session::flash('danger', 'Client not found.');
            return redirect()->route('admin.clients.index');
        }
        // Return view
        return view("Admin::client.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ClientRequest  $request, $id)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['slug']); #make slug for menu
        // Check already presents or not
        // Find menu
        $model = Client::where('clients.id', $id)
            ->select('clients.*')
            ->first();

        // Image file 
        $client_image = $request->file('image_link');

        if($client_image) {
            $client_image_title = str_replace(' ', '-', $input['slug'] . '.' . $client_image->getClientOriginalExtension());
            $client_image_link = $this->client_image_relative_path.'/'.$client_image_title;
        }else{
            $client_image_link = $model->image_link;
            $client_image_title = $model->image_link;
        }

        $input['image_link'] = $client_image_title;


        DB::beginTransaction();
        try {
            // Update menu
            $result = $model->update($input);

            if($result){

                if($client_image != null){
                    File::Delete($model->image_link);
                    $client_image->move($this->client_image_path, $client_image_title);
                }
                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect(config('global.prefix_name').'/client/index');
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
        $model =Client::where('clients.id', $id) 
            ->select('clients.*')
            ->first();
        DB::beginTransaction();
        try {
            // Category update
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }
            if($model->save())
            {
                DB::commit();
                Session::flash('message', "Successfully Deleted.");
            }
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
        $model = new Client();
        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim(Input::get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('clients.status', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('slug', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('short_order', 'LIKE', '%'.$search_keywords.'%');
                    
                    $query = $query->orWhere('description', 'LIKE', '%'.$search_keywords.'%');
                });
            $data = $model->where('status','active')->select('clients.*')->paginate(30);
        }else{

            // If get data not found
            $data = Client::where('status','active')->paginate(30);
        }

        // Return view
        return view("Admin::client.index", compact('data','pageTitle'));

    }
}
