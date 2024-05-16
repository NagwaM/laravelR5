<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('insertClient',[ClientController::class, 'store'])->name('insertClient');
Route::get('addClient',[ClientController::class, 'create'])->name('addClient');
Route::get('clients',[ClientController::class, 'index'])->name('clients');
//session_5
Route::get('editClient/{id}',[ClientController::class, 'edit'])->name('editClient');
Route::put('updateClient/{id}',[ClientController::class, 'update'])->name('updateClient');
Route::get('showClient/{id}',[ClientController::class, 'show'])->name('showClient');
Route::delete('deleteClient',[ClientController::class, 'destroy'])->name('deleteClient');

//task3
Route::post('insertStudent',[StudentController::class, 'store'])->name('insertStudent');
Route::get('addStudent',[StudentController::class, 'create'])->name('addStudent');
//end of task3

//task4
Route::get('students',[StudentController::class, 'index'])->name('students');

//task5
Route::get('editStudent/{id}',[ClientController::class, 'edit'])->name('editStudent');
Route::put('updateStudent/{id}',[ClientController::class, 'update'])->name('updateStudent');
Route::get('showStudent/{id}',[ClientController::class, 'show'])->name('showStudent');
Route::delete('deleteStudent',[ClientController::class, 'destroy'])->name('deleteStudent');

Route::get('nagwa/{id?}', function($id = 0){
    return 'Welcome to my first website ' . $id;
})->whereNumber('id');

Route::get('course/{name}', function($name){
    return 'My name is: ' . $name;
})->whereIn('name',['nagwa', 'Ahmed', 'mariam']);

Route::prefix('cars')->group(function(){
    Route::get('bmw', function(){
        return 'Category is BMW';
    });

    Route::get('mercedes', function(){
        return 'Category is Mercedes';
    });
});

Route::get('test20', [MyController::class, 'my_data']);

// Route::get('test20', function(){
//     return view('test');
// });

Route::get('form1', function(){
    return view('form1');
});

// Route::post('recForm1', function(){
//     return 'Data received';
// })->name('receiveForm1'); session2

//task2
Route::post('recForm1', [MyController::class, 'receiveForm1'])->name('receiveForm1');

// Route::fallback(function(){
//     // return 'The required is not found';
//     return redirect('/');
// });