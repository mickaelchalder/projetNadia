<?php

use App\Models\Articles;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\HommageController;
use Faker\Provider\Lorem;

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

    // route vers le formulaire et son traitement 
    Route::get('formulaire', [FormulaireController::class, 'create']);
    Route::post('formulaire', [FormulaireController::class, 'store']);

    // route vers la newsletter et son traitement 
    Route::post('abbonnement', [NewsletterController::class, 'store']);
    Route::get('newsletter', [NewsletterController::class, 'create']);

    //route vers page d'ajout/de modification et de suppression d'article  
    Route::get('AddArticle', [ArticleController::class, 'listeArticle'])->name('add');



    //route d'affichage des changement du calendrier 
    Route::post('nextRoute', [CalendarController::class, 'affichageCalendarNextMonth']); 
    Route::post('prevRoute', [CalendarController::class, 'affichageCalendarPrevMonth']); 
    


    //route vers un événement d'une date contenant aussi la fonction de suppression automatique d'événements
    Route::post('event', [CrudController::class, 'autoSuppression']);

    //route d'affichage de tous les événements dans l'ordre du plus récent
    Route::get('allEvent',[CrudController::class, 'afficherTous']);

    //route vers une page d'ajout/de modification et de suppression d'article  
    Route::post('/calendrier',  [CrudController::class, 'ajouterEvent'] )->name('creation');
    
    // route de suppression  d'événements
    Route::delete('/supprimer', [CrudController::class, 'supprimerEvent'] )->name('supprimer'); 
    //route de modification d'événements
    Route::put('/modifEvent', [CrudController::class, 'modifierEvent'] )->name('modifEvent'); 
    //route de récupération de l'événement pour affichage avant modification
    Route::put('/modifier', [CrudController::class, 'edit'] )->name('modifier'); 
    


    // Route pour ajouter un article
    Route::post('/articles', [ArticleController::class, 'ajouterArticle']);

    // Route pour supprimer un article
    Route::delete('/articles/{article}', [ArticleController::class, 'supprimerArticle']);

    // Route pour aller à la page de modification de l'article
    Route::get('/articles/{article}', [ArticleController::class, 'edit'])->name('edit');

    // Route pour modifier un article
    Route::put('/modifArticle', [ArticleController::class, 'modifierArticle']);
        


    // Route pour la page d'accueil
    Route::get('/listeProduit', [ProduitController::class, 'listeProduit'])->name('listeP');

    // Route pour la page d'accueil
    Route::get('/listeHommage', [HommageController::class, 'listeHommage'])->name('listeH');

    // Route pour ajouter un hommage
    Route::post('/addHommage', [HommageController::class, 'ajouterHommage']);


    // Route pour modifier un hommage
    Route::put('/modifHommage', [HommageController::class, 'modifierHommage']);

    // Route pour aller à la page de modification de l'hommage
    Route::get('/hommages/{hommage}', [HommageController::class, 'editHommage'])->name('editHommage');

    // Route pour supprimer un hommage
    Route::delete('/hommages/{hommage}', [HommageController::class, 'supprimerHommage']);




    Route::post('/addProduit', [ProduitController::class, 'ajouterProduit']);

    // Route pour supprimer un hommage
    Route::delete('/produits/{produit}', [ProduitController::class, 'supprimerProduit']);

    // Route pour aller à la page de modification du produit
    Route::get('/modifProduits/{produit}', [ProduitController::class, 'editProduit'])->name('editProduit');

    // Route pour aller à l'article
    Route::get('/produits/{produit}', [ProduitController::class, 'getProduit'])->name('getProduit');

    // Route pour modifier un hommage
    Route::put('/modifProduit', [ProduitController::class, 'modifierProduit']);



});

Route::get('/dashboard', [ArticleController::class, 'Accueil_calendrier']);

require __DIR__.'/auth.php';
