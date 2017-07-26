<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function create(){
    	return view('registration.insert');
    }

    public function store(){
    	//validate the form
    	$this->validate(request(), [
    			'username'=>'required',
    			'email'=>'required|email',
    			'password'=>'required'
    		]);

    	//create and save the user
    	$user=new User;
    	$user->name=request('username');
    	$user->email=request('email');
    	$user->password=bcrypt(request('password'));

    	try{
    		$user->save();

    		auth()->login($user);

    		return redirect()->home();

    	}catch(\Exception $e){

    		echo "some error";

    		return back()->withErrors([
                        'message' => 'email già registrata' 
                ]);
    	}
    }
}
