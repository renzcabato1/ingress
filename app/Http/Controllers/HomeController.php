<?php

namespace App\Http\Controllers;
use App\Visitor;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::orderBy('gate_pass_id','asc')->whereNull('time_out')->get();
        return view('show_barcode_list')->with('visitors', $visitors);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
}
