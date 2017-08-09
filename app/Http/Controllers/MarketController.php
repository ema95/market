<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Operatore;
use App\Area;
use App\Mercato;


use DB;

class MarketController extends Controller
{

    public function insert(){
        
          $areas = Area::all();
          return view("market/insert",compact('areas'));
      }	


      public function store(Request $request){

            $mercato = new Mercato;
            return  $mercato->newMarket($request);

        }

        public function handle(){
            $areas = Area::all();
            return view('market/handle',compact('areas'));
        }

        public function getPlacesByMarketId(Request $request){

            $IDMercato=$request->input('IDMercato');
            dd(
                Mercato::select('postazione.latitudine AS posLat','postazione.longitudine AS posLon')
                ->join('area','area.IDArea','=','mercato.IDArea')
                ->join('postazione','area.IDArea','=','postazione.IDArea')
                ->where('mercato.IDMercato','=',$IDMercato)
                ->get()
                ->toJson()
                );
        }
}
