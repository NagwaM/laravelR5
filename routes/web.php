<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});

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