<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Articles;

class ArticleController extends Controller
{
    /**
     * [Liste de tous les articles]
     * @return [type] [description]
     */
    public function listeArticle(){
        $articles = Articles::orderBy("created_at", "desc")->paginate(9); 
        return view('accueil', ['articles' => $articles]);
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

}