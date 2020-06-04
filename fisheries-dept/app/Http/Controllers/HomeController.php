<?php

namespace App\Http\Controllers;
use App\Fishpond;
use App\User;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function farmerList()
    {
        $farmers=Fishpond::all();

        return view('farmer_list',['farmers'=>$farmers]);
    }

    public function findFarmer(Request $request)
    {
        $farmer=Fishpond::findOrFail($request->id);
        return $farmer;
    }

    public function applicationlist()
    {
        $applications=Fishpond::where('approve','0')->paginate(12);
        $users=User::count();
        $fishponds=Fishpond::where('approve','1')->count();
        $applied=Fishpond::count();
        return view('applications',compact('applications','users','fishponds','applied'));
        // return view('applications',['applications'=>$applications]);
    }
    public function viewDetails($id)
    {
        $fishpond=Fishpond::findOrFail($id);
        return view('fishpond_detail',['fishpond'=>$fishpond]);
    }

    public function approve($id)
    {
        $application=Fishpond::find($id);
        $application->approve='1';
        $application->save();
        $applications=Fishpond::where('approve','0')->get();
        return view('applications',['applications'=>$applications]);
    }

    public function resubmit($id)
    {
        $application=Fishpond::find($id);
        $application->approve='2';
        $application->save();
        $applications=Fishpond::where('approve','0')->get();
        return view('applications',['applications'=>$applications]);
    }

    public function resubmitList()
    {
        $resubmit=Fishpond::where('approve','2')->get();
        return view('resubmit',['resubmit'=>$resubmit]);
    }

    public function resubmitViewDetails($id)
    {   
        $fishpond=Fishpond::findOrFail($id);
        return view('resubmit_details',['fishpond'=>$fishpond]);
    }
    public function approveResubmit($id)
    {
        $fishpond=Fishpond::findOrFail($id);
        $fishpond->approve='1';
        $fishpond->save();
        $resubmit=Fishpond::where('approve','2')->get();
        return view('resubmit',['resubmit'=>$resubmit]);

    }

}
