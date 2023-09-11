<?php

namespace App\Modules\Web\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Web\Models\ForLegalAid;
use App\Modules\Web\Models\LegalAidPanel;
use App\Modules\Web\Models\MemberShip;
use App\Modules\Web\Requests;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Session;

class FormController extends Controller
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

    protected $forLegalAid_image_path;
    protected $forLegalAid_image_relative_path;

    protected $LegalAidPanel_image_path;
    protected $LegalAidPanel_image_relative_path;

    protected $membership_image_path;
    protected $membership_image_relative_path;



    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->forLegalAid_image_path = public_path('uploads/forLegalAid');
        $this->forLegalAid_image_relative_path = '/uploads/forLegalAid';

        $this->LegalAidPanel_image_path = public_path('uploads/LegalAidPanel');
        $this->LegalAidPanel_image_relative_path = '/uploads/LegalAidPanel';

        $this->membership_image_path = public_path('uploads/membership');
        $this->membership_image_relative_path = '/uploads/membership';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forLegalAid()
    {
        $pageTitle = 'For Legal Aid';

        return view('Web::form.forlegalaid', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function forLegalAidStore(Requests\ForLegalAidRequest $request)
    {
        // Get all input data
        $input = $request->all();
        // Image link 
        $forLegalAid_image = $request->file('nid_file');
        $user_image = $request->file('image_link');

        if ($forLegalAid_image && $user_image) {

            $forLegalAid_image_title = str_replace(' ', '-', $input['email'] . '-' . time() . '.' . $forLegalAid_image->getClientOriginalExtension());
            $forLegalAid_image_link = $this->forLegalAid_image_relative_path . '/' . $forLegalAid_image_title;

            $user_image_title = str_replace(' ', '-', $input['phone'] . '-' . time() . '.' . $user_image->getClientOriginalExtension());
            $user_image_link = $this->forLegalAid_image_relative_path . '/' . $user_image_title;
        } else {
            $forLegalAid_image_link = '';
            $forLegalAid_image_title = '';

            $user_image_link = '';
            $user_image_title = '';
        }

        $input['nid_file'] = $forLegalAid_image_title;
        $input['image_link'] = $user_image_title;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            $forLegalAid_data = ForLegalAid::create($input);

            if ($forLegalAid_data) {
                // Store category image
                if ($forLegalAid_image != null) {
                    $forLegalAid_image->move($this->forLegalAid_image_path, $forLegalAid_image_title);

                    $user_image->move($this->forLegalAid_image_path, $user_image_title);
                }

                DB::commit();
            }
            Session::flash('message', 'For Legal Aid is Successfully Submited!');
            return redirect()->back();
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            print($e->getMessage());
            exit();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function legalAidPanel()
    {
        $pageTitle = 'Legal Aid Panel Member';

        return view('Web::form.legalaidPanel', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function LegalAidPanelStore(Requests\LegalAidPanelRequest $request)
    {
        // Get all input data
        $input = $request->all();
        // Image link 

        $legal_aid_panel = $request->file('image_link');

        if ($legal_aid_panel) {

            $legal_aid_panel_title = str_replace(' ', '-', $input['phone'] . '-' . time() . '.' . $legal_aid_panel->getClientOriginalExtension());
            $legal_aid_panel_link = $this->LegalAidPanel_image_relative_path . '/' . $legal_aid_panel_title;
        } else {

            $legal_aid_panel_link = '';
            $legal_aid_panel_title = '';
        }

        $input['image_link'] = $legal_aid_panel_title;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            $model = LegalAidPanel::create($input);

            if ($model) {
                // Store category image
                if ($legal_aid_panel != null) {
                    $legal_aid_panel->move($this->LegalAidPanel_image_path, $legal_aid_panel_title);
                }

                DB::commit();
            }
            Session::flash('message', 'Legal Aid Panel Data is Successfully Submited!');
            return redirect()->back();
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            print($e->getMessage());
            exit();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function membership()
    {
        $pageTitle = 'Membership Form';

        return view('Web::form.membership', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function membershipStore(Requests\MembershipRequest $request)
    {
        // Get all input data
        $input = $request->all();
        $rules = [
            'email' => 'required|email|unique:membership',
            'phone' => 'required|unique:membership',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Continue with your existing logic
        $membership = $request->file('image_link');

        if ($membership) {

            $membership_title = str_replace(' ', '-', $input['phone'] . '-' . time() . '.' . $membership->getClientOriginalExtension());
            $membership_link = $this->membership_image_relative_path . '/' . $membership_title;
        } else {

            $membership_link = '';
            $membership_title = '';
        }

        $input['image_link'] = $membership_title;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            $model = MemberShip::create($input);

            if ($model) {
                // Store category image
                if ($membership != null) {
                    $membership->move($this->membership_image_path, $membership_title);
                }

                DB::commit();
            }
            Session::flash('message', 'Membership Data is Successfully Submited!');
            return redirect()->back();
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            print($e->getMessage());
            exit();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();
    }
}
