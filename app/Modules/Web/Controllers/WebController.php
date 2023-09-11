<?php

namespace App\Modules\Web\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Donation;
use App\Modules\Admin\Models\Legal;
use App\Modules\Admin\Models\Location;
use App\Modules\Admin\Models\Team;
use App\Modules\Blog\Models\Blog;
use App\Modules\Blog\Models\Testimonial;
use DB;

class WebController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Welcome to Official Website of Aid For Men';

        $aboutUs = DB::table('general_pages')->where('tag', 'about-us')->first();

        $slider = DB::table('slider')->where('status', 'active')->orderBy('short_order', 'asc')->limit(5)->get();
        $partner = DB::table('partner')->where('status', 'active')->get();
        $activity = DB::table('general_pages')->where('status', 'active')->where('tag', 'recent-activity')->orderBy('id', 'desc')->limit(6)->get();

        $news = DB::table('general_pages')->where('status', 'active')->where('tag', 'our-news')->orderBy('id', 'desc')->limit(12)->get();

        $testimonial = DB::table('testimonial')->where('status', 'active')->orderBy('id', 'asc')->limit(6)->get();

        $photo = DB::table('gallery')->where('status', 'active')->where('tags', 'photo')->orderBy('id', 'desc')->limit(12)->get();
        $teams = DB::table('team')->where('status', 'active')->limit(12)->get();
        $blog = Blog::where('status', 'active')->where('status', 'active')->orderby('date', 'DESC')->limit(12)->get();

        return view("Web::home.index", compact('pageTitle', 'partner', 'aboutUs', 'slider', 'activity', 'news', 'testimonial', 'photo', 'blog', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $pageTitle = "Contact Us";

        return view('Web::pages.contact', compact('pageTitle'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
        $pageTitle = "About Us";
        $aboutUs = DB::table('general_pages')->where('tag', 'about-us')->first();
        return view('Web::pages.about', compact('pageTitle', 'aboutUs'));
    }
    public function megazine()
    {
        $pageTitle = "Proposed Magazine";
        $megazine = DB::table('general_pages')->where('tag', 'proposed-magazine')->first();
        return view('Web::pages.megazine', compact('pageTitle', 'megazine'));
    }
    public function sponsor()
    {
        $pageTitle = "Become a sponsor";
        $sponsor = DB::table('general_pages')->where('tag', 'become-a-sponsor')->first();
        return view('Web::pages.sponsor', compact('pageTitle', 'sponsor'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ourTeam()
    {
        $pageTitle = "Our Team";
        $team = DB::table('team')->where('status', 'active')->get();

        return view('Web::pages.team', compact('pageTitle', 'team'));
    }

    public function donationListing()
    {
        $pageTitle = "Donation " . getenv('APP_NAME');

        $donation = Donation::orderBy('id', 'asc')->where('status', 'active')->get();

        return view('Web::pages.donation', compact('pageTitle', 'donation'));
    }

    public function locationListing()
    {
        $pageTitle = "Donation " . getenv('APP_NAME');

        $location = Location::orderBy('id', 'asc')->where('status', 'active')->get();

        return view('Web::pages.location', compact('pageTitle', 'location'));
    }
    public function teamListing()
    {
        $pageTitle = "Comittie members " . getenv('APP_NAME');

        $team = Team::orderBy('id', 'asc')->where('status', 'active')->get();

        return view('Web::pages.team', compact('pageTitle', 'team'));
    }
    
        public function testimonialListing()
    {
        $pageTitle = "Volunteer Says " . getenv('APP_NAME');

        $testimonial = DB::table('testimonial')->where('status', 'active')->orderBy('id', 'asc')->get();

        return view('Web::pages.testimonial', compact('pageTitle', 'testimonial'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function missionVision()
    {
        $pageTitle = "Mission Vision";

        $mission = DB::table('general_pages')->where('tag', 'mission')->where('status', 'active')->first();

        return view('Web::pages.mission', compact('pageTitle', 'mission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notice()
    {
        $pageTitle = "Notice";

        $notice = DB::table('notice_career')->where('tag', 'notice')->where('status', 'active')->paginate(10);

        return view('Web::pages.notice', compact('pageTitle', 'notice'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recentActivity()
    {
        $pageTitle = "Recent Activity";

        $activity = DB::table('general_pages')->where('status', 'active')->where('tag', 'recent-activity')->orderBy('id', 'desc')->paginate(30);

        return view('Web::pages.recentActivity', compact('pageTitle', 'activity'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recentActivityDetails($id, $title)
    {
        $pageTitle = $title;

        $activity = DB::table('general_pages')->where('id', $id)->where('tag', 'recent-activity')->first();

        $activitymore = DB::table('general_pages')->where('status', 'active')->where('tag', 'recent-activity')->whereNotIn('id', [$id])->orderBy('id', 'desc')->limit(6)->get();

        return view('Web::pages.activityDetails', compact('pageTitle', 'activity', 'activitymore'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function legal()
    {
        $pageTitle = "Our News";

        $data = DB::table('general_pages')->where('status', 'active')->where('tag', 'our-news')->orderBy('id', 'desc')->paginate(30);

        return view('Web::pages.ourNews', compact('pageTitle', 'data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function legalDetails($slug)
    {
        // dd($slug);
        $data = Legal::query()->where('slug', $slug)->where('status', 'active')->first();

        $pageTitle = $legal->name;
        // dd($legal);

        return view('Web::pages.legalDetails', compact('pageTitle', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ourNews()
    {
        $pageTitle = "Our News";

        $data = DB::table('general_pages')->where('status', 'active')->where('tag', 'our-news')->orderBy('id', 'desc')->paginate(30);

        return view('Web::pages.ourNews', compact('pageTitle', 'data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ourNewsDetails($id, $title)
    {
        $pageTitle = $title;

        $activity = DB::table('general_pages')->where('status', 'active')->where('id', $id)->where('tag', 'our-news')->first();

        $activitymore = DB::table('general_pages')->where('status', 'active')->where('tag', 'our-news')->whereNotIn('id', [$id])->orderBy('id', 'desc')->limit(6)->get();

        return view('Web::pages.ourNewsDetails', compact('pageTitle', 'activity', 'activitymore'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function videoGallery()
    {
        $pageTitle = "Video Gallery";

        $data = DB::table('gallery')->where('tags', 'video')->orderBy('id', 'desc')->paginate(30);

        return view('Web::pages.videoGallery', compact('pageTitle', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function photoGallery()
    {
        $pageTitle = "Photo Gallery";

        $data = DB::table('gallery')->where('tags', 'photo')->where('status', 'active')->orderBy('id', 'desc')->paginate(30);

        return view('Web::pages.photoGallery', compact('pageTitle', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function helpform()
    {
        $pageTitle = "Help Form";

        return view('Web::form.helpform', compact('pageTitle'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        $pageTitle = "Blog";

        $data = Blog::where('status', 'active')->orderby('date', 'DESC')->paginate(30);

        return view('Web::pages.blog', compact('pageTitle', 'data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogDetails($id, $title)
    {
        $pageTitle = $title;

        $data = Blog::where('id', $id)->where('status', 'active')->orderby('date', 'DESC')->first();

        $blogmore = Blog::where('status', 'active')->orderby('date', 'DESC')->paginate(30);

        return view('Web::pages.blogDetails', compact('pageTitle', 'data', 'blogmore'));
    }
}
