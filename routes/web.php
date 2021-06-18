<?php

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FormulaireController;

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

// Route permet de grouper et assigner un middleware à toutes les routes
// Middleware fonctionne un peu comme un filtre avant d'accéder aux routes, là en l'occurrence il dirige vers le fichier web 
Route::group(["middleware" => "web"], function(){

    // Route pour la page d'accueil
    Route::get('/', [ArticleController::class, 'listeArticle']);

    // Route pour aller à l'article
    Route::get('/articles/{article}', [ArticleController::class, 'getArticle']);

    Route::get('/', function () {
        return view('accueil');
    });
    Route::get('formulaire', [FormulaireController::class, 'create']);
    Route::post('formulaire', [FormulaireController::class, 'store']);
});
