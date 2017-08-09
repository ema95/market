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

    public function store(Request $request){

    	$postazione= new Postazione;
             return $postazione->newPlace($request);
    }


    public function selectByIdArea(){

        //could be a method selectPlaceById in the model
       return (Postazione::select('IDPostazione','postazione.latitudine','postazione.longitudine','luogo')
        ->join('area' , 'postazione.IDArea' , '=' , 'area.IDArea')
        ->orderBy('IDPostazione','ASC')
        ->get()
        ->toJson());

    }
    
    public function updateType(Request $request){

            $id=$request->input('IDPostazione');
            $tipologie=$request->input('tipologia');    
                try{
                         for($i=0;$i<count($id);$i++)
                            Postazione::where('IDPostazione','=',$id[$i])
                            ->update(['IDTipologia' => $tipologie[$i]]); 
                        
                        return redirect()->back()->with('message','Postazioni aggiornate correttamente');

                }catch(\Exception $e){
                        echo $e->getMessage();
            }
    }

    public function handle(){

        return view('place.handle');

    }

    public function selectAllByIdArea(Request $request){
           dd( Postazione::where('postazione.IDArea','=',$request->input('IDArea'))->get()->toJson());
    }
}
