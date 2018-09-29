<?php

namespace App\Http\Controllers;

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
    public function summary()
    {
        return view('summary');
    }
	
	/**
     * Show the application messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function messages()
    {
        return view('messages'); 
    }
	
	/**
     * Show the application forms.
     *
     * @return \Illuminate\Http\Response
     */
    public function forms()
    {
        return view('forms'); 
    }
	
	/**
     * Show the application customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function customers()
    {
        return view('customers'); 
    }
	
	/**
     * Show the application payments.
     *
     * @return \Illuminate\Http\Response
     */
    public function payments()
    {
        return view('payments'); 
    }
	
	/**
     * Show the application users.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        return view('users'); 
    }	
	
	/**
     * Show the application integrations.
     *
     * @return \Illuminate\Http\Response
     */
    public function integrations()
    {
        return view('integrations'); 
    }
	
	/**
     * Show the application support.
     *
     * @return \Illuminate\Http\Response
     */
    public function support()
    {
        return view('support'); 
    }
	
}
