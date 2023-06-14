<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/crud', function () {
    return view('crud.index');
});

Route::get('/crud/new', function () {
    return view('crud.new');
});

Route::get('/crud/edit/{id}', function () {
    return view('crud.edit');
});

Route::get('/activate/{id}', function () {
    return view('crud.activate');
});