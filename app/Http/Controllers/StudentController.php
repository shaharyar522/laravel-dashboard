<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // es  say mar data students k table say fetch hn kay wellcome main show hnga table main 
    // jo kay main nay wahan par loop ko use kya ina 
    public function show()
    {
        $student = DB::table('students')->get();
        return view('welcome', ['data' => $student]);
    }

    // sutdent ka data ko insert karing guy hun apnay database main 

    public function StudentAdd_data(Request $req)
    {


        //start Add new data


        // uay condition wala hessa hain jo ka emil ko or roll number ko unque bany hunva hian 
        $emailExists = DB::table('students')->where('email', $req->student_email)->exists();
        $rollExists = DB::table('students')->where('roll_number', $req->student_roll)->exists();

        if ($emailExists) {
            return redirect()->back()->with('status', 'email_exists');
        }

        if ($rollExists) {
            return redirect()->back()->with('status', 'roll_exists');
        }

        // end codition 


        $student = DB::table('students')->insert(
            [
                'name' => $req->student_name,
                'email' => $req->student_email,
                'phone' => $req->student_phone,
                'class' => $req->student_class,
                'roll_number' => $req->student_roll,
                'dob' => $req->student_dob,
                'created_at' => now(),
                'updated_at' => now(),

            ]
        );
        if ($student) {
            return redirect()->route('home')->with('status', 'success');
        } else {
            return redirect()->back()->with('status', 'error');
        }
    }


    //end new data addd





    // start  show view data 

    //  single user view ab main main chata hun agar koe banda view par aa kay clikc karay to us ko wo data show hun 
    public function SingleUsershowData(string $id)
    {
        $student = DB::table('students')->get()
            ->where('id', $id);
        return view('single-user-view', compact('student'));
    }

    // end the view data


    //satrt the delete 

    public function  Delete_student_record(string $id)
    {
        $student = DB::table('students')
            ->where('id', $id)
            ->delete();
        if ($student) {
            return redirect()->back()->with('status', 'deleted');
        } else {
            return redirect()->back()->with('status', 'not_deleted');
        }
    }
    

    //
}
