<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // es  say mar data students k table say fetch hn kay wellcome main show hnga table main 
    // jo kay main nay wahan par loop ko use kya ina 
    public function show(){
        $student = DB::table('students')->get();
         return view('welcome',['data'=>$student]);
    }

    // sutdent ka data ko insert karing guy hun apnay database main 

    public function StudentAdd_data()
    {
        
      

    }







   
    //  single user view ab main main chata hun agar koe banda view par aa kay clikc karay to us ko wo data show hun 
    public function SingleUsershowData(string $id)
     {
              $student = DB::table('students')->get()
              ->where('id',$id);
            return view('single-user-view',compact('student'));
      }



}
