<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mercato;

class Area extends Model
{
    protected $table="area";
    protected $primaryKey="IDArea";
    public $timestamps=false;
    
    public function __construct($righe,$colonne,$luogo){
    	$this->righe = $righe;
    	$this->colonne = $colonne;
    	$this->luogo = $luogo;
    }
    public function markets(){
    	return $this->hasMany('App\Mercato');
    }
}
