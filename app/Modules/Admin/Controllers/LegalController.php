<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Legal;
use App\Modules\Admin\Requests;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class LegalController extends Controller
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

    protected $legal_pdf_path;
    protected $legal_pdf_relative_path;



    /**
     * menu constructor.
     */
    public function __construct()
    {

        $this->legal_pdf_path = public_path('uploads/legal');
        $this->legal_pdf_relative_path = '/uploads/legal';
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $pageTitle = "List of  Legal";
        // Get Parent user data
        $data = Legal::where('status', 'active')->paginate(30);
        // return view
        return view("Admin::legal.index", compact('data', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Legal";
        // return View
        return view("Admin::legal.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\LegalRequest $request)
    {
        // Get all input data
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not

        // Pdf link 
        $legal_pdf = $request->file('pdf_link');

        if ($legal_pdf) {
            $legal_pdf_title = str_replace(' ', '-', $input['slug'] . '.' . $legal_pdf->getClientOriginalExtension());
            $legal_pdf_link = $this->legal_pdf_relative_path . '/' . $legal_pdf_title;
        } else {
            $legal_pdf_link = '';
            $legal_pdf_title = '';
        }

        $input['image_link'] = $legal_image_title;

        //Imagelink 
        $legal_image = $request->file('image_link');

        if ($legal_image) {
            $legal_image_title = str_replace(' ', '-', $input['slug'] . '.' . $legal_image->getClientOriginalExtension());
            $legal_image_link = $this->legal_pdf_relative_path . '/' . $legal_image_title;
        } else {
            $legal_image_link = '';
            $legal_image_title = '';
        }

        $input['image_link'] = $legal_image_title;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            // Store user data 
            if ($legal_data = Legal::create($input)) {
                // Store category image
                if ($legal_pdf != null) {
                    $legal_pdf->move($this->legal_pdf_path, $legal_pdf_title);
                }
                if ($legal_image != null) {
                    $legal_image->move($this->legal_pdf_path, $legal_image_title);
                }
            }

            DB::commit();
            Session::flash('message', 'Legal is added!');
            return redirect(config('global.prefix_name') . '/legal/index');
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
        $pageTitle = 'View Legal Informations';

        // Find menu data
        $data = Legal::where('id', $id)->first();

        if (!empty($data)) {
            // If found menu
            return view("Admin::legal.show", compact('data', 'pageTitle'));
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
        $pageTitle = "Update Legal";
        // Find menu
        $data = Legal::where('id', $id)->first();
        // If Client not found                
        if (empty($data)) {
            Session::flash('danger', 'Legal not found.');
            return redirect()->route('admin.legal.index');
        }
        // Return view
        return view("Admin::legal.edit", compact('data', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\LegalRequest  $request, $id)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['slug']); #make slug for menu
        // Check already presents or not
        // Find menu
        $model = Legal::where('id', $id)->first();

        // Pdf file 
        $legal_pdf = $request->file('pdf_link');

        if ($legal_pdf) {
            $legal_pdf_title = str_replace(' ', '-', $input['slug'] . '.' . $legal_pdf->getClientOriginalExtension());
            $legal_pdf_link = $this->legal_pdf_relative_path . '/' . $legal_pdf_title;
        } else {
            $legal_pdf_link = $model->pdf_link;
            $legal_pdf_title = $model->pdf_link;
        }

        $input['pdf_link'] = $legal_pdf_title;
        //Imagelink 
        $legal_image = $request->file('image_link');

        if ($legal_image) {
            $legal_image_title = str_replace(' ', '-', $input['slug'] . '.' . $legal_image->getClientOriginalExtension());
            $legal_image_link = $this->legal_pdf_relative_path . '/' . $legal_image_title;
        } else {
            $legal_image_link = $model->image_link;
            $legal_image_title = $model->image_link;
        }

        $input['image_link'] = $legal_image_title;

        DB::beginTransaction();
        try {
            // Update menu
            $result = $model->update($input);

            if ($result) {

                if ($legal_pdf != null) {
                    File::Delete($model->pdf_link);
                    $legal_pdf->move($this->legal_pdf_path, $legal_pdf_title);
                }

                if ($legal_image != null) {
                    File::Delete($model->image_link);
                    $legal_image->move($this->legal_pdf_path, $legal_image_title);
                }

                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect(config('global.prefix_name') . '/legal/index');
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
        $model = Legal::where('legal.id', $id)
            ->select('legal.*')
            ->first();
        DB::beginTransaction();
        try {
            $pdfPath = $this->legal_pdf_path . '/' . $model->pdf_link;
            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }
            $imagePath = $this->legal_pdf_path . '/' . $model->image_link;
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
        $pageTitle = 'Legal Information';
        // User model initialize
        $model = new Legal();
        if ($this->isGetRequest()) {
            // Search data found
            $search_keywords = trim(Input::get('search_keywords'));
            $model = $model->where(function ($query) use ($search_keywords) {
                $query = $query->orWhere('name', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('slug', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('description', 'LIKE', '%' . $search_keywords . '%');
            });
            $data = $model->where('status', 'active')->select('legal.*')->paginate(30);
        } else {

            // If get data not found
            $data = Legal::where('status', 'active')->paginate(30);
        }

        // Return view
        return view("Admin::legal.index", compact('data', 'pageTitle'));
    }
}
