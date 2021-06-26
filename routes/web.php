<?php

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CrudController;

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
    Route::get('/', [ArticleController::class, 'Accueil_calendrier']);

    // Route pour aller à l'article
    Route::get('/modifArticles/{article}', [ArticleController::class, 'getArticle']);

    
    Route::get('formulaire', [FormulaireController::class, 'create']);
    Route::post('formulaire', [FormulaireController::class, 'store']);
    Route::post('newsletter', [FormulaireController::class, 'news']);


    Route::get('AddArticle', [ArticleController::class, 'listeArticle'])->name('add');




 Route::post('nextRoute', [CalendarController::class, 'affichageCalendarNextMonth']); 
 Route::post('prevRoute', [CalendarController::class, 'affichageCalendarPrevMonth']); 
 /* Route::get('nextYear', [CalendarController::class, 'affichageCalendarNextYear']); 
 Route::get('prevYear', [CalendarController::class, 'affichageCalendarPrevYear']);  */

Route::post('event', [CrudController::class, 'autoSuppression']);
Route::post('/calendrier',  [CrudController::class, 'ajouterEvent'] )->name('creation');


Route::delete('/supprimer', [CrudController::class, 'supprimerEvent'] )->name('supprimer'); 

Route::put('/modifEvent', [CrudController::class, 'modifierEvent'] )->name('modifEvent'); 

Route::put('/modifier', [CrudController::class, 'edit'] )->name('modifier'); 
 
// Route pour ajouter un article
Route::post('/articles', [ArticleController::class, 'ajouterArticle']);

// Route pour supprimer un article
Route::delete('/articles/{article}', [ArticleController::class, 'supprimerArticle']);

// Route pour modifier un article
Route::put('/modifArticle', [ArticleController::class, 'modifierArticle']);

// Route pour aller à la page de modification de l'article
Route::get('/articles/{article}', [ArticleController::class, 'edit']);
    
});

Route::get('/dashboard', [ArticleController::class, 'Accueil_calendrier']);

require __DIR__.'/auth.php';
