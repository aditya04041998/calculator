<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Calculate;

class Calculator extends Controller
{
    public function index(){
         $data = DB::table('calculator')
            ->where('status','1')
            ->where('is_deleted','0')
            ->orderBy('id', 'desc')
            ->take(3)
            ->select('calculator.*')
            ->get();  
        return view('calculator',['data'=>$data]);
    }
    public function save(Request $request){
            $calculator = new Calculate;
            $calculator->calculated_value = $request->calculated_value;
            $calculator = $calculator->save();
            if($calculator){
                return '001';
            }else{
                 return '000';
            }
    }
    public function delete(Request $request){
        $arr = ['is_deleted' =>'1'];
                    $update = DB::table('calculator')
                    ->where('id',$request->id)
                    ->update($arr);
            if($update){
                return '001';
            }else{
                return '001';
            }

    }
}
