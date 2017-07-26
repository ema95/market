<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipologia;

class TypeController extends Controller
{
    public function insert(){

    	return view('type.insert');
    }

    public function store(){
    	$tipologia = new Tipologia;
    	$tipologia->tipo=request('tipologia');
    	try{
    		$tipologia->save();
    		echo "inserito correttamente";
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}
    }
}
