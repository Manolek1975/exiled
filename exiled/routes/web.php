<?php

use Illuminate\Support\Facades\Route;
use App\Models\Grupo;
use App\Models\Categoria;
use App\Models\Quest;

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

Route::get('/', function() {
    $grupos = Grupo::all();
    $categorias = Categoria::all();
    return view('index', compact('grupos', 'categorias'));
});

Route::get('/index', function() {
    $grupos = Grupo::all();
    $categorias = Categoria::all();
    return view('index', compact('grupos', 'categorias'));
});

Route::get('/categorias/{id}', function($id) {
    $grupos = Grupo::all();
    $categorias = Categoria::all();
    $quests = Quest::where('categoria_id', $id)->get();
    $categoria = Categoria::where('id', $id)->first();
    return view('categorias', compact('grupos', 'categorias', 'quests', 'categoria'));
});

Route::get('/quests/{id}', function($id) {
    $grupos = Grupo::all();
    $categorias = Categoria::all();
    $quest = Quest::find($id);
    // Como el progreso es un array json, decodificamos para generar un array
    $progreso = json_decode($quest->progreso, true);
    return view('quests', compact('grupos', 'categorias', 'quest', 'progreso'));
});
