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
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => false, 'logout' => false]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/', function(){include '/home/nrosales/domains/todovidrio.uy/public_html/index.html';});
Route::get('/inicio', function(){include '/home/nrosales/domains/todovidrio.uy/public_html/index.html';});
Route::get('/sobre-nosotros', function(){include '/home/nrosales/domains/todovidrio.uy/public_html/sobre_nosotros.html';});
Route::get('/productos', 'ProductoController@show_list');
Route::get('/productos/detalle/{id?}', 'ProductoController@show');
Route::get('/nuestros-trabajos', function(){include '/home/nrosales/domains/todovidrio.uy/public_html/nuestros_trabajos.html';});
Route::get('/contacto', function(){include '/home/nrosales/domains/todovidrio.uy/public_html/contacto.html';});
Route::post('/sendMail', 'MailController@send');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('', 'AdminController@index');
    Route::get('productos/', 'ProductoController@index');
    Route::get('productos/create', 'ProductoController@create')->name('productos.create');
    Route::get('productos/{id}/edit', 'ProductoController@edit')->name('productos.edit');
    Route::get('productos/getAll', 'ProductoController@getAll')->name('productos.getAll');
    Route::post('productos/','ProductoController@store')->name('productos.store');
    Route::post('productos/update/{id}','ProductoController@update')->name('productos.update');
    Route::post('productos/{id}/delete','ProductoController@destroy');
    // Route::resource('productos', 'ProductoController');
});