<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * [Liste de tous les articles]
     * @return [type] [description]
     */
    public function Accueil_calendrier(){
        $calendar=CalendarController::buildCalendrier();
        $mois=CalendarController::mois();
        $semaine=CalendarController::semaine();
        $nbJour=CalendarController::nombreJourMois($calendar->month,$calendar->year);
        $premierJour=CalendarController::PremierJourDuMois($calendar->month,$calendar->year);
        $eventa = CrudController::listedate($calendar->month,$calendar->year);
        $articles = Articles::orderBy("created_at", "desc")->paginate(9); 
        $calendrier = true;
        return view('accueil', ['articles' => $articles,'eventa' => $eventa,'date' => $calendar,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour,'calendrier' => $calendrier]);
    }

    public function getArticle(Articles $article){
        $articles = Articles::find($article->id);
        return view('articles', ['articles' => $articles]);
    }

    /**
     * [Récupère les données d'un article en fonction de son ID pour être modifier]
     * @param  Articles $article [Appel de la classe]
     * @return [view]            [Redirige vers la view avec la nouvelle variable en paramètre]
     */
    public function edit(Articles $article){
        // Récupération d'un tuple (=entrée) avec l'ID dans une BDD 
        $articleModif = Articles::find($article->id);
        // Redirige vers la view avec un paramètre
        return view('modifArticle', ["articleModif" => $articleModif]);
    }

     /**
      * [Methode pour ajouter un article]
      *
      * @param  request $request ["request" définit le type de la variable (class request) et est possible 
      *                          d'utiliser avec le use "use Illuminate\Http\Request" avec Laravel]
      *                          ["$request" est l'objet récupéré du formulaire]
      * @return [view]           [retour à la page d'accueil après l'enregistrement de l'article dans la BDD]
      */
    public function ajouterArticle(request $request){

        // Vérifie les conditions de l'objet
        $validator = Validator::make($request->all(), [
            'titre' => 'required|max:255',
            'img' => 'image|mimes:jpg,png,jpeg,gif|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'message' => 'required',
            ]);

        // En cas d'erreurs, il redirige vers la page d'accueil
        if($validator->fails()){
            $validator->fails();
            return redirect()->route('add')->withInput();
        };

        // Vérifie s'il y a un fichier
        if ($request->hasFile('img')) {

        // Récupère le nom de l'image plus le temps pour que l'image soit unique lors de la sauvegarde
        $image = time().$_FILES['img']['name'];

        // Sauvegarder une image
        $request->file('img')->storePubliclyAs('public/image/', $image);
        }else{
            $image = "logo.jpg";
        }

        // Création d'une instance
        $article = new Articles();
        // Assignation des attributs
        $article->titre = $request->titre;
        $article->img = $image;
        $article->message = $request->message;
        // Requête INSERT INTO vers la BDD
        $article->save();

        // Redirige vers la page d'accueil
        return redirect()->route('add');
    }

    /**
     * [Modifie l'article]
     * @param  Request $request ["request" définit le type de la variable (class request) et est possible 
      *                          d'utiliser avec le use "use Illuminate\Http\Request" avec Laravel]
     * @return [view]           [retour à la page d'accueil après la modification de l'article dans la BDD]
     */
    public function modifierArticle(Request $request){

        $validator = Validator::make($request->all(), [
            'titre' => 'required|max:255',
            'img' => 'image|mimes:jpg,png,jpeg,gif|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'message' => 'required',
            ]);

        // En cas d'erreurs, il redirige vers la page d'accueil
        if($validator->fails()){
            return redirect()->route('add')->withInput($request->except('key'))
            ->withErrors($validator);
        }

        // Récupération d'un tuple (=entrée) avec l'ID dans une BDD 
        $article = Articles::find($request->id);
        
        // Vérifie s'il y a un fichier
        if ($request->hasFile('img')) {

            $article->img = $request->img2;
            // Suppression de l'ancienne image dans le dossier image
            Storage::delete('public/image/'.$article->img);

            // Récupère le nom de l'image plus le temps pour que l'image soit unique lors de la sauvegarde
            $image = time().$_FILES['img']['name'];

            // Sauvegarder une image
            $request->file('img')->storePubliclyAs('public/image/', $image);
            $article->img = $image;
        
        }else{
            // Récupération du nom de l'image non modifier
            $article->img = $request->img2;
        }
        // Assignation des attributs
        $article->titre = $request->titre;        
        $article->message = $request->message;
        $article->save();
        // Redirige vers l'accueil
        return redirect()->route('add');
    }

    /**
     * [Supprimer l'article]
     * @param  Articles $article [Appel de la classe]
     * @return [view]            [Redirection]
     */
    public function supprimerArticle(Articles $article){
        
        if($article->img != "logo.jpg"){
        // Suppression l'image dans le dossier image
        Storage::delete('public/image/'.$article->img);
        }
        // Requête SQL DELETE
        $article->delete();
        // Redirige vers l'accueil
        return redirect()->route('add');
    }

    /**
     * [Liste de tous les articles]
     * @return [type] [description]
     */
    public function listeArticle(){
        $articles = Articles::orderBy("created_at", "desc")->get();
        return view('ajouterArticle', ["articles" => $articles]);
    }
}