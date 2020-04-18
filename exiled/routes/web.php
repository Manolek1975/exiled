<?php

use Illuminate\Support\Facades\Route;
use App\Models\Grupo;
use App\Models\Categoria;
use App\Models\Quest;
use App\Models\Area;

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

Route::view('/', 'index');
Route::view('/index', 'index');

Route::get('/areas', function() {
    $categoria = Categoria::where('slug', 'areas')->firstOrFail();
    $areas = Area::all();
    return view('areas', compact('categoria', 'areas'));
});

Route::get('/area/{id}', function($id) {
    $categoria = Categoria::where('slug', 'areas')->firstOrFail();
    $area = Area::find($id);
    $leyenda = json_decode($area->leyenda, true);
    return view('area', compact('categoria', 'area', 'leyenda'));
});
