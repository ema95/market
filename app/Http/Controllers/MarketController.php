<?php

namespace App\Http\Controllers;

use App\User;
use App\Operatore;
use App\Area;
use App\Mercato;


use DB;

class MarketController extends Controller
{
    public function getArea(){

                //$matrix = Area::where('IDArea','=', request('IDArea'))->get();
                //DB::table('area')->select('righe','colonne')->where('IDArea','=', $param['IDArea'])->get();

        $area=Area::find(request('IDArea')); // cerca l'area corrispondente a IDArea

        return response()->json([
            'righe'=>$area->righe,
            'colonne'=>$area->colonne
            ]);
    }


    public function insert(){
   	 	$areas = Area::all(); //prelevo le aree disponibili tramite il Model Area
   	 	
          return view("market/insert",compact('areas'));
      }	


      public function store(){
    		/*try {
    			DB::table('mercato')->insert([
    					'dataCreazione' => $param['data'],
    					'IDArea' => $param['IDArea']
    				]);
    			echo "inserito correttamente";
    		} catch (\Exception $e) {
    			if($e->getCode()==23000){
    				echo "L'area selezionata è già occupata il giorno {$param['data']}";
    			}
    		} */
                       

            $mercato = new Mercato;
            $mercato->dataCreazione=request('data');
            $mercato->IDArea=request('IDArea');
            try{
                $mercato->save();
                echo "inserito correttamente";
            }catch(\Exception $e){

                if($e->getCode()==23000)
                    echo "già occupato per il giorno scelto";
            }
        }
    }
