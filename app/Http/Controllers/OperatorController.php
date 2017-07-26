<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Operatore;
use App\Area;

class OperatorController extends Controller
{
    public function show(){


    }
    public function insert(){
        
        return view('operator/insert'); // possiamo specificare un secondo parametro, compact(array) dove array contiene tutte le informazioni necessarie per inizializzare la view



    }

    public function store(){
        //Handle POST Request
        $param=request()->all();
        $operatore = new Operatore;
        $operatore->nome=request('nome');
        $operatore->cognome=request('cognome');
        $operatore->codiceFiscale=request('codiceFiscale');
        $operatore->tipo=request('tipo');
    try{
        
        $operatore->save();

            return response()->json([
                'response'=>'success',
                'message'=>'operatore inserito correttamente'
            ]); 

    }catch(\Exception $e){
        if($e->getCode()==23000)

            return response()->json([
                'response'=>'duplicate',
                'message'=>'codice fiscale già presente nel sistema'
            ]); 
           
    } 
    }
}
