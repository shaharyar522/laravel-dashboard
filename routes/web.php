<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| be assigned to the "web" middlware group. Make something great!
|
|
*/

// Route::get('/', function (){
//     return view('welcome');
// });


// only show data form data base and  show in my table 
Route::get('/', [StudentController::class, 'show'])->name('home');

// now add the user in data base

Route::post('/add', [StudentController::class, 'StudentAdd_data'])->name('add-student');




// i want to show  a single user when click the view buttun
Route::get('/studentid/{id}', [StudentController::class, 'SingleUsershowData'])->name('single-user-id');


// main ab delete ka bana o ga 
Route::get('/delete-student/{id}', [StudentController::class, 'Delete_student_record'])->name('student_recod_delete');



//update the web dataa hian
Route::get('/update-student', [StudentController::class, 'Update_student_record']);


//
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
// ab main updte karo ga
Route::put('/update/{id}', [StudentController::class, 'update_student_record'])->name('update_student_record');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
