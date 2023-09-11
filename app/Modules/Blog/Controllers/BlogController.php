<?php

namespace App\Modules\Blog\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blog\Models\Blog;
use App\Modules\Blog\Requests;
use App\Modules\Category\Models\Category;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Session;
use Storage;

class BlogController extends Controller
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

    protected $blog_image_path;
    protected $blog_image_relative_path;



    /**
     * blogController constructor.
     */
    public function __construct()
    {

        $this->blog_image_path = public_path('uploads/blog');
        $this->blog_image_relative_path = '/uploads/blog';
    }

    protected static function array_of_size()
    {
        $array_of_size = array(
            'orginal_image',
            '200'
        );

        return $array_of_size;
    }

    /**
     *  Check if Directory Exists
     */
    protected static function check_directory($target_location, $value)
    {

        $target_location = $target_location . '/' . $value . 'x' . $value;
        if (!Storage::disk('public')->exists($target_location)) {
            $target_location = public_path($target_location);

            File::makeDirectory($target_location, 0777, true, true);
        }

        return true;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "List of Post";
        // Get Parent category data
        $data = Blog::orderby('date', 'DESC')->where('status', 1)->paginate(30);

        return view("Blog::post.index", compact('data', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Post";

        // find child & parent relations
        $parent_category_options = Category::getHierarchyCategory('');

        // return View
        return view("Blog::post.create", compact('parent_category_options', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\BlogRequest $request)
    {
        // Get all input data
        $input = $request->all();

        // Check already presents or not
        $data = Blog::where('slug', $input['slug'])->exists();

        if (!$data) {


            // Check image file exists or not
            if ($request->hasfile('image_link')) {

                // Image link 
                $blog_image = $request->file('image_link');

                if (!empty($blog_image)) {

                    $image_info = getimagesize($blog_image);

                    // check image dimension in width & height
                    // if((isset($image_info['0']) && $image_info['0'] != 1024) && isset($image_info['1']) && $image_info['1'] != 1024){
                    //     Session::flash('error', 'Image size must be width 1024 px & height 1024 px');    
                    //   return redirect()->back();
                    // }

                    // Check image size

                    /* if($blog_image->getClientSize() > 1024)
                        {
                            Session::flash('error', 'This Image size bigger than 1 MB');    
                            return redirect()->back();
                        }*/
                    if ($blog_image) {
                        $blog_image_title = str_replace(' ', '-', $input['slug'] . '.' . $blog_image->getClientOriginalExtension());
                        $blog_image_link = $this->blog_image_relative_path;
                        $this->image_upload($blog_image_title, $blog_image->getRealPath(), $blog_image_link);
                    } else {
                        $blog_image_link = '';
                        $blog_image_title = '';
                    }

                    $input['image_link'] = $blog_image_title;
                }
            }


            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store cateogory data 
                if ($category_data = Blog::create($input)) {

                    DB::commit();
                    Session::flash('message', 'Post is added!');
                }

                return redirect(config('global.prefix_name') . '/post/index');
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                print($e->getMessage());
                exit();
                Session::flash('danger', $e->getMessage());
            }
        } else {
            Session::flash('info', 'This Post already added!');
        }
        return redirect()->back();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function image_upload($image_name, $realpath, $destinationPath)
    {
        // Check image name presents or not
        if ($image_name != '') {
            // get sizes
            $sizes = self::array_of_size();

            if (count($sizes) > 0) {

                $uploaddestinationPath = $destinationPath;

                foreach ($sizes as $value) {

                    if ($value == 'orginal_image') {
                        $target_location = $uploaddestinationPath . '/' . 'orginal_image';
                        if (!Storage::disk('public')->exists($target_location)) {
                            $target_location = public_path($target_location);

                            File::makeDirectory($target_location, 0777, true, true);
                        }

                        // upload image
                        $destinationPath =  public_path($target_location);

                        $img = Image::make($realpath);
                        $img->save($target_location . '/' . $image_name);
                    } elseif ($value != 'orginal_image') {
                        // create directory
                        $target_location = $uploaddestinationPath . '/' . $value . 'x' . $value;
                        if (!Storage::disk('public')->exists($target_location)) {
                            $target_location = public_path($target_location);

                            File::makeDirectory($target_location, 0777, true, true);
                        }

                        // upload image
                        $destinationPath =  public_path($target_location);

                        $img = Image::make($realpath);
                        $img->resize($value, $value, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($target_location . '/' . $image_name);
                    }
                }
            }
        }

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'View Post Informations';

        // Find blog post data
        $data = Blog::findOrfail($id);

        if (!empty($data)) {
            // If found blog post
            return view("Blog::post.show", compact('data', 'pageTitle'));
        } else {
            // If blog post not found
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
        $pageTitle = "Update Post";

        // Find blog
        $data = Blog::where('blogs.id', $id)
            ->select('blogs.*')
            ->first();

        // If blog not found                
        if (count($data) <= 0) {
            Session::flash('danger', 'Post not found.');
            return redirect()->route('admin.blog.index');
        }

        // Get parent & child hierarchy
        $parent_category_options = Category::getHierarchyCategory('');

        // Return view
        return view("Blog::post.edit", compact('data', 'parent_category_options', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get all input data
        $input = $request->all();

        // Check already presents or not
        $data = Blog::where('id', $id)->first();

        if ($data) {


            // Check image file exists or not
            if ($request->hasfile('image_link')) {

                // Image link 
                $blog_image = $request->file('image_link');

                if (!empty($blog_image)) {

                    $image_info = getimagesize($blog_image);

                    // check image dimension in width & height
                    // if((isset($image_info['0']) && $image_info['0'] != 1024) && isset($image_info['1']) && $image_info['1'] != 1024){
                    //     Session::flash('error', 'Image size must be width 1024 px & height 1024 px');    
                    //     return redirect()->back();
                    // }

                    // Check image size

                    /* if($blog_image->getClientSize() > 1024)
                        {
                            Session::flash('error', 'This Image size bigger than 1 MB');    
                            return redirect()->back();
                        }*/
                    if ($blog_image) {
                        $blog_image_title = str_replace(' ', '-', $input['slug'] . '.' . $blog_image->getClientOriginalExtension());
                        $blog_image_link = $this->blog_image_relative_path;
                        $this->image_upload($blog_image_title, $blog_image->getRealPath(), $blog_image_link);
                    } else {
                        $blog_image_link = $data->image_link;
                        $blog_image_title = $data->image_link;
                    }

                    $input['image_link'] = $blog_image_title;
                }
            }


            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store cateogory data 
                $result = $data->update($input);
                if ($result) {

                    DB::commit();
                    Session::flash('message', 'Post is updated!');
                }

                return redirect(config('global.prefix_name') . '/post/index');
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                print($e->getMessage());
                exit();
                Session::flash('danger', $e->getMessage());
            }
        } else {
            Session::flash('info', 'Post not found!');
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
        $model = Blog::where('blogs.id', $id)
            ->select('blogs.*')
            ->first();

        DB::beginTransaction();
        try {
            // Category update
            if ($model->status == 'active') {
                $model->status = 'cancel';
            } else {
                $model->status = 'active';
            }

            $model->save();

            DB::commit();
            Session::flash('message', "Successfully Deleted.");
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        // redirect to current page
        return redirect()->back();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {


        $pageTitle = 'Post Information';

        // Blog model initialize
        $model = new Blog();

        if ($this->isGetRequest()) {
            // Search data found
            $search_keywords = trim(Input::get('search_keywords'));
            $model = $model->where(function ($query) use ($search_keywords) {
                $query = $query->orWhere('title', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('slug', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('date', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('short_description', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('status', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('description', 'LIKE', '%' . $search_keywords . '%');
            });
            $data = $model->orderby('date', 'DESC')->paginate(30);
        } else {

            // If get data not found
            $data = Blog::orderby('date', 'DESC')->paginate(30);
        }

        // Return view
        return view("Blog::post.index", compact('data', 'pageTitle'));
    }

    //for ckeditor image upload
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File

            $request->file('upload')->move(public_path('uploads/editor'), $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/editor/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
