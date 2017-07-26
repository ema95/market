<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Postazione;
use App\Tipologia;

class PlaceController extends Controller
{
    public function insert(){
        
       	$areas=Area::all();
             $types=Tipologia::all();

    	return view('place/insert',compact('areas','types'));
    }

    public function store(){

    	$postazione= new Postazione;

    	$postazione->IDArea=request('IDArea');
    	$postazione->riga=request('riga');
    	$postazione->colonna=request('colonna');
    	$postazione->IDTipologia=request('IDTipologia');
    	try{
    		$postazione->save();
    		echo "postazione inserita correttamente";
    	}catch(\Exception $e){
    		if($e->getCode()==23000){
                                echo "posizione già occupata da un'altra postazione";
                }   
    	}
    }
}
