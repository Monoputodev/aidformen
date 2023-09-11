<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Statustic;
use App\Modules\Web\Models\ForLegalAid;
use App\Modules\Web\Models\LegalAidPanel;
use App\Modules\Web\Models\MemberShip;
use Auth;
use Barryvdh\DomPDF\PDF as PDF;
use DB;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admin = Auth::guard()->user();
        $pageTitle = 'Admin Dashboard';


        return view("Admin::dashboard.index", compact('admin', 'pageTitle'));
    }

    public function documentation()
    {
        $pageTitle = 'Software Documentation';

        return view("Admin::layouts.documentation", compact('pageTitle'));
    }

    public function statustic_index(Request $request)
    {
        $pageTitle = "Statustic Page";
        $data = Statustic::where('id', '1')->first();
        return view("Admin::statustic.index", compact('pageTitle', 'data'));
        // Return view
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statustic_update(Request $request, $id)
    {
        $input = $request->all();
        $model = Statustic::where('id', $id)->first();

        DB::beginTransaction();
        try {
            // Update menu
            $result = $model->update($input);

            if ($result) {
                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect(config('global.prefix_name') . '/statustics');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    public function forlegalaid()
    {
        $pageTitle = 'For Legal Aid';

        $data = ForLegalAid::where('status', 'active')->orderBy('id', 'desc')->paginate(20);
        return view('Admin::dashboard.forlegalaid', compact('pageTitle', 'data'));
    }
    public function legalaidpanel()
    {
        $pageTitle = 'Legal Aid Panel';

        $data = LegalAidPanel::where('status', 'active')->orderBy('id', 'desc')->paginate(20);
        return view('Admin::dashboard.legalaidpanel', compact('pageTitle', 'data'));
    }
    public function membership()
    {
        $pageTitle = 'Legal Aid Panel';

        $data = MemberShip::where('status', 'active')->orderBy('id', 'desc')->paginate(20);
        return view('Admin::dashboard.membership', compact('pageTitle', 'data'));
    }

    public function membershipPrint($id)
    {
        // retreive all records from db
        $data = MemberShip::find($id);
        $name = $data->name;
        $pageTitle = $name;
        // share data to view
        // return view('Admin::dashboard.membership_print', compact('pageTitle', 'data'));
        view()->share('data', $data);
        $pdf = PDF::loadView('Admin::dashboard.membership_print', $pageTitle, $data);
        return $pdf->download($name . '.pdf');
    }


    public function membership_view($id)
    {
        $pageTitle = 'Membership view';

        $data = MemberShip::where('id', $id)->where('status', 'active')->orderBy('id', 'desc')->first();
        return view('Admin::dashboard.membership_view', compact('pageTitle', 'data'));
    }
}
