<?php 
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Area;
    use App\Postazione;

    class AreaController extends Controller
    {
        public function insert(){
        	return view('area.insert');
        }

        public function store(Request $request){
                    
            //move to the model class
            $area = new Area;
            return $area->newArea();
            
        }

        public function getCoordinates(){
            return Area::find(request('areaID'))->toJson();
        }
    }
