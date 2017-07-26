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

        public function store(){
                    //server-side validation
            $this->validate(request(), [
                    'righe'=>'required',
                    'colonne'=>'required',
                    'luogo'=>'required'
                ]);
        	$area = new Area(request('righe'),request('colonne'),request('luogo'));
        	try{  


        		$area->save();
                            return redirect()->back()->with('message','Area inserita correttamente');

        	}catch(\Exception $e){

        		echo $e->getMessage();
        	}

    /*            try{
                            for($i=0;$i<request('righe'); $i++){
                                for($j=0;$j<request('colonne');$j++){
                                    $postazione= new Postazione;
                                    $postazione->riga=$i;
                                    $postazione->colonna=$j;
                                    $postazione->IDArea = $area->IDArea;

                                    $postazione->save();
                                }
                            }
                }catch(\Exception $e){
                    echo $e->getMessage();
                }
    */
        }
    }
