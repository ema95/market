<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function __construct(){
    	$this->middleware('guest', ['except' => 'destroy']);
    }
    public function index(){
    	return view('session.index');
    }

    public function store(){

    	if(! auth()->attempt(request(['email','password']))) {
    		return back()->withErrors([
    				'message' => 'email o password errati, riprovare'
    			]);
    	}

    	return redirect()->home();
   }

    public function destroy(){

        auth()->logout();
        return redirect()->home();

    }
}
