<?php

namespace Database\Seeders;
use App\Models\student;


use Illuminate\Database\Seeder;

// file ko read karnay k leuy hian 
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = File::get(path:'database/json/students.json');
        $students = collect(json_decode($json));

        $students->each(function($student){
            student::create([
                'name' => $student->name,
                'email' => $student->email,
                'phone' => $student->phone,
                 'class' => $student->class,
                 'roll_number' =>$student->roll_number,
                 'dob' => $student->dob,
            ]);
        });
    }
}
