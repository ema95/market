<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipologia extends Model
{
    protected $table = "tipologia";
    public $timestamps=false;

    public function newType($request){

	    $this->tipo = $request->input('tipologia');
	    	try{
	    		$this->save();
	    		return redirect()->route('handlePlace')->with('message','tipologia inserita correttamente');
	            	}catch(\Exception $e){
	    		echo $e->getMessage();
	    	}
	    }
}
