<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mercato;

class Area extends Model
{
    protected $table="area";
    protected $primaryKey="IDArea";
    public $timestamps=false;
    
    public function markets(){
    	return $this->hasMany('App\Mercato');
    }

    public function newArea($request){

            $this->luogo=$request->input('luogo');
            $this->latitudine=$request->input('lat');
            $this->longitudine=$request->input('lon');
        	try{  

        		$area->save();
                            return response()->json([
                                'response'=>'success',
                                'message'=>'area inserita correttamente'
                            ]); 
        	}catch(\Exception $e){

        		  return response()->json([
                                'response'=>'success',
                                'message'=>'Something went wrong...'
                            ]); 
        	}
    }

    public static function getCoordinates($request){

            return Area::select('latitudine','longitudine')
            ->where('IDArea','=',$request->input('IDArea'))
            ->get()
            ->toJson();

    }
}
