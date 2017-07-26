<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipologia;
use App\Autorizzazione;

class AuthorizationController extends Controller
{
    public function insert(){
    	$types=Tipologia::all();
    	return view('authorization.insert',compact('types'));
    }
    public function store(){

    	$autorizzazione= new Autorizzazione;
    	$autorizzazione->IDTipologia=request('IDTipologia');
    	try{
    		$autorizzazione->save();
                          echo "inserito correttamente";
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}
    }
}
