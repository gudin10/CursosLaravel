<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('getadmin');
});

Route::get('/home', function () {
    return redirect()->route('getadmin');
});
//Routes Auth
Route::get('/login','ConnectController@getLogin')->middleware('guest')->name('login');
Route::post('/login','ConnectController@postLogin')->name('login');

Route::get('/register','ConnectController@getRegister')->name('register');

Route::post('/register','ConnectController@postRegister')->name('register');

Route::get('/logout','ConnectController@getLogout')->name('logout');

//Route::get('/admin','Admin\DashboardControlller@getDashboard')->name('admin');

Route::prefix('admin')->middleware('auth')->group(function(){

    Route::get('/','Admin\DashboardController@getDashboard')->name('getadmin');// Admin/Dashboard...
    Route::get('/users','Admin\UserController@getUsers');
    //Modulo Cursos
    Route::get('/cursos','Admin\CursoController@getHome');
    Route::get('/cursos/add','Admin\CursoController@getCursoAdd');
    Route::post('/cursos/add','Admin\CursoController@postCursoAdd');

    Route::get('/cursos/{id}/edit','Admin\CursoController@getCursoEdit');
    Route::post('/cursos/{id}/edit','Admin\CursoController@postCursoEdit');
    Route::get('/cursos/{id}/delete','Admin\CursoController@getCursoDelete');
    
    Route::post('/cursos/add','Admin\CursoController@postCursoAdd');

    //agregar
    Route::get('/categorias/{modulo}','Admin\CategoriasController@getHome');
    Route::post('/categorias/add','Admin\CategoriasController@postCategoriaAdd');
    //editar
    Route::get('categorias/{id}/edit','Admin\CategoriasController@getCategoriaEdit');
    Route::post('categorias/{id}/edit','Admin\CategoriasController@postCategoriaEdit');
    //Borrar
    Route::get('categorias/{id}/delete','Admin\CategoriasController@getCategoriaDelete');


    
});

/*Route::get('/admin', function(){
    return 'Hola mudos';
});*/




