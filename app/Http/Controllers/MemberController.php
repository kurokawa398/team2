<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\reception;

class MemberController extends Controller
{
    public function member(Request $request){
        $day=date('Y/m/d');

        $params = $request->query(); 
        $items=reception::search($params)
                 ->join('participant','reception.participant_no','=','participant.participant_no')
                 ->join('discipline','reception.discipline_id','=','discipline.discipline_id')
                 ->join('course','reception.course_id','=','course.course_id')
                 ->where('attend_date','=',$day)
                 ->get();
                 
        return view('page.B03')->with([
            'items'=>$items,
            "request"=>$request
         ]);

    }

    public function B006(Request $request){
        $params = $request->query(); 
        $items=reception::search($params)
                 ->join('participant','reception.participant_no','=','participant.participant_no')
                 ->join('discipline','reception.discipline_id','=','discipline.discipline_id')
                 ->join('course','reception.course_id','=','course.course_id')
                 ->get();
                 
        return view('page.B06')->with([
            'items'=>$items,
            "request"=>$request
         ]);

    }

    
}
