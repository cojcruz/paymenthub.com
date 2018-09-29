<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
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
     * Show the recent payments activity.
     *
     * @return \Illuminate\Http\Response
     */
    public function listforms()
    {
		
    } 	
	
	public function create() {
		
		return view('createform');
		
	}
	
	public function edit() {
		
	}
	
	public function duplicate() {
		
	}
	
}
