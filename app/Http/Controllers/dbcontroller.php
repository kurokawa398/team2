<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dbcontroller extends Controller
{
  public function B012(Request $request) {
   $items = DB::select('select * from users');
   return view('page.B12',['items'=>$items]);
  }

  public function B010(Request $request) {
    $param = ['no'=> $request->no];
    $items = DB::select('select * from reception INNER JOIN participant ON reception.participant_no = participant.participant_no INNER JOIN discipline ON reception.discipline_id = discipline.discipline_id WHERE approval = 0');
    return view('page.B10',['items'=>$items]);
   }

   public function change(Request $request) {
    $param = ['no'=> $request->no];
    DB::update('update reception set approval=1 where reception_no = :no', $param);
    $items = DB::select('select * from reception INNER JOIN participant ON reception.participant_no = participant.participant_no INNER JOIN discipline ON reception.discipline_id = discipline.discipline_id WHERE approval = 0');
    return view('page.B10',['items'=>$items]);
   }

   public function add(Request $request) {
    $param = ['email'=> $request->mail];
    DB::update('update users set admit=1 where email = :email', $param);
    $items = DB::select('select * from users');
    return view('page.B12',['items'=>$items]);
   }
   

  public function delete(Request $request) {
    $param = ['email'=> $request->mail];
    DB::delete('delete from users where email = :email', $param);
    $items = DB::select('select * from users');
    return view('page.B12',['items'=>$items]);
  }
}
