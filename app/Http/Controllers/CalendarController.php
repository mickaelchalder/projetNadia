<?php

namespace App\Http\Controllers; // pour désigné les chemins

use App\Models\Articles;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use App\Http\Requests\NextRequest;
use App\Http\Requests\PrevRequest;

class CalendarController extends Controller
{
    

    public static function affichageCalendarNextMonth(NextRequest $request){
        $next=$request->next;
        $calendar=CalendarController::buildCalendrier();
        $varMois=CalendarController::buildMoisCalendrier();
        $newCalendrier=CalendarController::buildNextCalendrier($next);
        $mois=CalendarController::mois();
        $semaine=CalendarController::semaine();
        $nbJour=CalendarController::nombreJourMois($newCalendrier->newMonth,$newCalendrier->newYear);
        $premierJour=CalendarController::PremierJourDuMois($newCalendrier->newMonth,$newCalendrier->newYear);
        $nextEventa = CrudController::listedate($newCalendrier->newMonth,$newCalendrier->newYear);
        $articles = Articles::orderBy("created_at", "desc")->paginate(9); 
        $calendrier = false;
        return view('accueil', ['articles' => $articles,'nextEventa' => $nextEventa,'calendar' => $calendar,'varMois' => $varMois,'newDate' => $newCalendrier,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour,'calendrier'=>$calendrier]);
    }
    public static function affichageCalendarPrevMonth(PrevRequest $request){
        $prev=$request->prev;
        
        $calendar=CalendarController::buildCalendrier();
        $varMois=CalendarController::buildMoisCalendrier();
        $newCalendrier=CalendarController::buildPrevCalendrier($prev);
        $mois=CalendarController::mois();
        $semaine=CalendarController::semaine();
        $nbJour=CalendarController::nombreJourMois($newCalendrier->newMonth,$newCalendrier->newYear);
        $premierJour=CalendarController::PremierJourDuMois($newCalendrier->newMonth,$newCalendrier->newYear);
        $prevEventa = CrudController::listedate($newCalendrier->newMonth,$newCalendrier->newYear);
        $articles = Articles::orderBy("created_at", "desc")->paginate(9); 
        $calendrier = false;
        return view('accueil', ['articles' => $articles,'nextEventa' => $prevEventa,'calendar' => $calendar,'varMois' => $varMois,'newDate' => $newCalendrier,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour,'calendrier'=>$calendrier]);

    }

    /* public static function affichageCalendarNextYear(){
        $next=$_GET['nextYear'];
        $calendar=CalendarController::buildCalendrier($next);
        $newCalendrier=CalendarController::buildNextYearCalendrier($next);
        $mois=CalendarController::mois();
        $semaine=CalendarController::semaine();
        $nbJour=CalendarController::nombreJourMois($newCalendrier->newMonth,$newCalendrier->newYear);
        $premierJour=CalendarController::PremierJourDuMois($newCalendrier->newMonth,$newCalendrier->newYear);
        $nextEventa = CrudController::listedate($newCalendrier->newMonth,$newCalendrier->newYear);
        $articles = Articles::orderBy("created_at", "desc")->paginate(9); 
        $calendrier = false;
        return view('accueil', ['articles' => $articles,'nextEventa' => $nextEventa,'calendar' => $calendar,'newDate' => $newCalendrier,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour,'calendrier'=>$calendrier]);
   
    } */
    /* public static function affichageCalendarPrevYear(){
        $next=$_GET['prevYear'];
        $calendar=CalendarController::buildCalendrier($next);
        $newCalendrier=CalendarController::buildPrevYearCalendrier($next);
        $mois=CalendarController::mois();
        $semaine=CalendarController::semaine();
        $nbJour=CalendarController::nombreJourMois($newCalendrier->newMonth,$newCalendrier->newYear);
        $premierJour=CalendarController::PremierJourDuMois($newCalendrier->newMonth,$newCalendrier->newYear);
        $nextEventa = CrudController::listedate($newCalendrier->newMonth,$newCalendrier->newYear);
        $articles = Articles::orderBy("created_at", "desc")->paginate(9); 
        $calendrier = false;
        return view('accueil', ['articles' => $articles,'nextEventa' => $nextEventa,'calendar' => $calendar,'newDate' => $newCalendrier,'mois' => $mois,'semaine' => $semaine,'nbJour' => $nbJour,'premierJour' => $premierJour,'calendrier'=>$calendrier]);
   
    } */

    public static function buildCalendrier($post=null) {
        //création d'une fonction qui crée un objet dateime 
        $calendrier = new \DateTime(); //le backslach permet d'utiliser la fonction php
        //ici j'enregistre la date actuel dans plusieur format 
        //affin de les ytiliser dans ma vue 
        $calendrier->date = $calendrier->format('Y-m-d');
        $calendrier->year = $calendrier->format('Y');
        $calendrier->month =$calendrier->format('m');
        $calendrier->day = $calendrier->format('d');
        return $calendrier;

    }
    
    public static function buildMoisCalendrier() {
        //création d'une fonction qui crée un objet dateime 
        $calendrier = new \DateTime(); //le backslach permet d'utiliser la fonction php
        //ici j'enregistre la date actuel dans plusieur format 
        //affin de les ytiliser dans ma vue 
        
        $leMois =$calendrier->format('m');
        return $leMois;

    }
    

    public static function buildNextCalendrier($post) { //ici la fonction va 
        //prendre en paramettre une date affin de lui ajoute un mois

        $newCalendrier = new \Datetime($post); 
        $newCalendrier->add(new \DateInterval('P1M')); //fonction qui ajoute 1mois
        $newCalendrier->newDate = $newCalendrier->format('Y-m-d');
        $newCalendrier->newYear = $newCalendrier->format('Y');
        $newCalendrier->newMonth =$newCalendrier->format('m');
        $newCalendrier->newDay = $newCalendrier->format('d');
        return $newCalendrier;

    }
    public static function buildPrevCalendrier($post,$id=null) {

        $newCalendrier = new \Datetime($post);  
        $newCalendrier->sub(new \DateInterval('P1M')); //fonction qui retire 1mois
        $newCalendrier->newDate = $newCalendrier->format('Y-m-d');
        $newCalendrier->newYear = $newCalendrier->format('Y');
        $newCalendrier->newMonth =$newCalendrier->format('m');
        $newCalendrier->newDay = $newCalendrier->format('d');
        return $newCalendrier;

    }
    /* public static function buildNextYearCalendrier($post,$id=null) {

        $newCalendrier = new \Datetime($post); //backslach pour faire comprendre que c'est une fonction 
        $newCalendrier->add(new \DateInterval('P1Y')); //fonction qui ajoute 1an
        $newCalendrier->newDate = $newCalendrier->format('Y-m-d');
        $newCalendrier->newYear = $newCalendrier->format('Y');
        $newCalendrier->newMonth =$newCalendrier->format('m');
        $newCalendrier->newDay = $newCalendrier->format('d');
        return $newCalendrier;

    } */
   /*  public static function buildPrevYearCalendrier($post,$id=null) {

        $newCalendrier = new \Datetime($post); //backslach pour faire comprendre que c'est une fonction 
        $newCalendrier->sub(new \DateInterval('P1Y')); //fonction qui retire 1an
        $newCalendrier->newDate = $newCalendrier->format('Y-m-d');
        $newCalendrier->newYear = $newCalendrier->format('Y');
        $newCalendrier->newMonth =$newCalendrier->format('m');
        $newCalendrier->newDay = $newCalendrier->format('d');
        return $newCalendrier;

    } */



    public static function nombreJourMois($month,$year) {
        //fonction qui permet d'obtenir le nombre de jour d'un mois à partir d'un mois et d'une année passé en paramètre
        $NbrDeJour=date("t",mktime(1,1,1,intval($month),1,intval($year)));
        return $NbrDeJour;
    }
    
    public static function PremierJourDuMois($month,$year) {
        //fonction qui permet d'obtenir le premier jour d'un mois à partir d'un mois et d'une année passé en paramètre
        $premierJour=date("w",mktime(1,1,1,intval($month),1,intval($year)));
        return $premierJour;
    }

    public static function Mois() {

        $mois = array(1=>"Janvier",2=>"Février",3=>"Mars",4=>"Avril",5=>"Mai",6=>"Juin",7=>"Juillet",8=>"Août",9=>"Septembre",10=>"Octobre",11=>"Novembre",12=>"Décembre");
        return $mois;
    }

    public static function semaine() {
        $jours = array(1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",7=>"Di",8=>"Lu",9=>"Ma",10=>"Me",11=>"Je",12=>"Ve",13=>"Sa",0=>"Di");
        return $jours;
    }

    
}
