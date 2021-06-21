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
    Route::get('/', [ArticleController::class, 'listeArticle']);

    // Route pour aller à l'article
    Route::get('/articles/{article}', [ArticleController::class, 'getArticle']);

    
    Route::get('formulaire', [FormulaireController::class, 'create']);
    Route::post('formulaire', [FormulaireController::class, 'store']);
    Route::get('newsletter', [NewsletterController::class, 'create']);
    Route::post('newsletter', [NewsletterController::class, 'store']);

    
Route::get('/', function () {
    $calendar=CalendarController::buildCalendrier();
    $mois=CalendarController::mois();
    $semaine=CalendarController::semaine();
    $nbJour=CalendarController::nombreJourMois($calendar->month,$calendar->year);
    $premierJour=CalendarController::PremierJourDuMois($calendar->month,$calendar->year);
    $eventa = CrudController::listedate($calendar->month,$calendar->year);
return view('calendrier', ['eventa' => $eventa,'date' => $calendar,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour]); // 1er  calendar est le  nom à insérer dans la view correspond à la variable récupérer
})->name('calendar');



 Route::get('nextRoute', function () {
    $next=$_GET['next'];
    $calendar=CalendarController::buildCalendrier($next);
    $newCalendrier=CalendarController::buildNextCalendrier($next);
    $mois=CalendarController::mois();
    $semaine=CalendarController::semaine();
    $nbJour=CalendarController::nombreJourMois($newCalendrier->newMonth,$newCalendrier->newYear);
    $premierJour=CalendarController::PremierJourDuMois($newCalendrier->newMonth,$newCalendrier->newYear);
    $nextEventa = CrudController::listedate($newCalendrier->newMonth,$newCalendrier->newYear);
    return view('nextCalendrier', ['nextEventa' => $nextEventa,'calendar' => $calendar,'newDate' => $newCalendrier,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour]); // 1er  calendar est le  nom à insérer dans la view correspond à la variable récupérer
})->name('nextRoute'); 

 Route::get('prevRoute', function () {
    $next=$_GET['prev'];
    $calendar=CalendarController::buildCalendrier($next);
    $newCalendrier=CalendarController::buildPrevCalendrier($next);
    $mois=CalendarController::mois();
    $semaine=CalendarController::semaine();
    $nbJour=CalendarController::nombreJourMois($newCalendrier->newMonth,$newCalendrier->newYear);
    $premierJour=CalendarController::PremierJourDuMois($newCalendrier->newMonth,$newCalendrier->newYear);
    $nextEventa = CrudController::listedate($newCalendrier->newMonth,$newCalendrier->newYear);
    return view('nextCalendrier', ['nextEventa' => $nextEventa,'calendar' => $calendar,'newDate' => $newCalendrier,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour]); // 1er  calendar est le  nom à insérer dans la view correspond à la variable récupérer
})->name('prevRoute'); 

 Route::get('nextYear', function () {
    $next=$_GET['nextYear'];
    $calendar=CalendarController::buildCalendrier($next);
    $newCalendrier=CalendarController::buildNextYearCalendrier($next);
    $mois=CalendarController::mois();
    $semaine=CalendarController::semaine();
    $nbJour=CalendarController::nombreJourMois($newCalendrier->newMonth,$newCalendrier->newYear);
    $premierJour=CalendarController::PremierJourDuMois($newCalendrier->newMonth,$newCalendrier->newYear);
    $nextEventa = CrudController::listedate($newCalendrier->newMonth,$newCalendrier->newYear);
    return view('nextCalendrier', ['nextEventa' => $nextEventa,'calendar' => $calendar,'newDate' => $newCalendrier,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour]); // 1er  calendar est le  nom à insérer dans la view correspond à la variable récupérer
})->name('nextYear'); 

 Route::get('prevYear', function () {
    $next=$_GET['prevYear'];
    $calendar=CalendarController::buildCalendrier($next);
    $newCalendrier=CalendarController::buildPrevYearCalendrier($next);
    $mois=CalendarController::mois();
    $semaine=CalendarController::semaine();
    $nbJour=CalendarController::nombreJourMois($newCalendrier->newMonth,$newCalendrier->newYear);
    $premierJour=CalendarController::PremierJourDuMois($newCalendrier->newMonth,$newCalendrier->newYear);
    $nextEventa = CrudController::listedate($newCalendrier->newMonth,$newCalendrier->newYear);
    return view('nextCalendrier', ['nextEventa' => $nextEventa,'calendar' => $calendar,'newDate' => $newCalendrier,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour]); // 1er  calendar est le  nom à insérer dans la view correspond à la variable récupérer
})->name('prevYear'); 

Route::get('event', function (){
    $fecha=$_GET['date'];
    $realDate=$_GET['realdate'];
    $deadEvent=CrudController::deadEvent($realDate);
    $event=CrudController::listeEvent($fecha);
    return view('textFormDay',['deadEvent'=>$deadEvent,'fecha'=>$fecha,'event' => $event]);
})->name('event'); 

Route::post('/calendrier',  [CrudController::class, 'ajouterEvent'] )->name('banane');


Route::delete('/supprimer', [CrudController::class, 'supprimerEvent'] )->name('supprimer'); 

Route::put('/modifEvent', [CrudController::class, 'modifierEvent'] )->name('modifEvent'); 

Route::put('/modifier', [CrudController::class, 'edit'] )->name('modifier'); 
 
});
