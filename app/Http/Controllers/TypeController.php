<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipologia;

class TypeController extends Controller
{
    public function insert(){

    	return view('type.insert');
    }

    public function store(Request $request){
        
    	$tipologia = new Tipologia;
             return $tipologia->newType($request);
    }

    public function getAll(){

        return Tipologia::all()->toJson();

    }
}
