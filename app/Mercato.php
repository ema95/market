<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;

class Mercato extends Model
{
    protected $table="mercato";
    protected $primaryKey="IDMercato";
    public $timestamps=false;

    public function area(){
    	return $this->belongsTo('App\Area');
    }

    public function newMarket($request){

            $this->dataCreazione=$request->input('data');
            $this->IDArea=$request->input('IDArea');
            try{
                $this->save();
                return redirect()->back()->with('message','mercato inserito correttamente');
            }catch(\Exception $e){

                if($e->getCode()==23000)
                return redirect()->back()->withErrors(['area già occupata nella data scelta']);
            }
    }
}
