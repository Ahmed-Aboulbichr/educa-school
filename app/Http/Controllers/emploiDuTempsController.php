<?php

namespace App\Http\Controllers;

use App\Matiere;
use App\Seance;
use App\Session;
use DateTime;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class emploiDuTempsController extends Controller
{    

      private function generateData($Seances){
        $data[][] = '';
        foreach ($Seances as $key => $Seance) {

            if($Seance->jour == "Sunday"){
                
              $day =  0 ;
            }else if($Seance->jour == "Monday"){
                
                
                $day =  1 ;
            
            }else if($Seance->jour == "Tuesday"){
                
                $day = 2 ;
            
            }else if($Seance->jour == "'Wednesday"){
                
                $day = 3 ;
            
            }else if($Seance->jour == "Thursday"){
                
                
                $day =  4 ;
            
            
            }else if($Seance->jour == "Friday"){
                
                $day =  5 ;
            
            }else if($Seance->jour == "Saturday"){
                
                $day = 6 ;
            
            }else{
                
                $day =  -1 ;

            }
            $date = date('Y-m-d H:i:s'); 
            $tempstart = date('Y-m-d H:i:s', strtotime(( $day - date('w', strtotime($date))).' day', strtotime($date))); 
            $tempstart = New DateTime($tempstart) ;
            $tempstart= $tempstart->setTime(date('H', strtotime($Seance->heure) ),date('i', strtotime($Seance->heure)));
            $temp = $tempstart;
            $data[$key]['id'] = $Seance->id;
            $data[$key]['start'] = $tempstart->format('Y-m-d H:i:s');
            $data[$key]['end'] = $temp->modify("+$Seance->duree minutes")->format('Y-m-d H:i:s') ;
            $data[$key]['title'] = $Seance->heure;
        }
        return response()->json($data) ;


    }
    public function index(Request $request)
    {
        if($request->ajax())
    	{
    	
            /*Seance::whereDate('heure', '>=', date('H:i:s', $request->start))
                       ->whereDate('duree',   '<=', round(abs(strtotime($request->end) - strtotime($request->start)) / 60,2) )
                       ->get();*/
    		$Seances = Seance::all();
            $this->generateData($Seances);
        }
        $matieres = Matiere::all();
        $sessions = Session::all();
    	return view('admin.emploi_du_temps.calendar')->with('matieres',$matieres)->with('sessions',$sessions);
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{    $data[][] = '';
    		if($request->type == 'add')
    		{
    			$Seances = Seance::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

                $this->generateData($Seances);
    		}

    		if($request->type == 'update')
    		{
    			$Seances = Seance::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);
                $this->generateData($Seances);
    		}
            
    		if($request->type == 'delete')
    		{
    			$Seance = Seance::findOrFail($request->id)->delete();
                $Seances = Seance::all();
                
              $this->generateData($Seances);
    		}
    	}
    }
}
