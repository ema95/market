<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postazione extends Model
{
    protected $table="postazione";
    public $timestamps=false;

	public function newPlace($request){

	    	$this->IDArea=$request->input('IDArea');
	    	$this->latitudine=$request->input('lat');
	    	$this->longitudine=$request->input('lon');
	    	$this->IDTipologia=$request->input('IDTipologia');

	    	try{

	    		$this->save();
	    		return response()->json([
	                                'response'=>'success',
	                                'message'=>'Postazione inserita correttamente'
	                            ]); 
	    	}catch(\Exception $e){

	    		if($e->getCode()==23000){
	                            return response()->json([
	                                'response'=>'success',
	                                'message'=>'Posizione già occupata'
	                            ]); 

	    	}	
	    }
	}
}
