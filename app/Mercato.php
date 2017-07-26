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

    
}
