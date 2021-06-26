@include('layout.header')
@include('layout.nav')
<div id="flex-container-accueil">	
    <span class="assoNom">À petits pas<div>avec</div><div>Jordan</div></span>
    {{-- <a href="#show" id="arrowDown"><img src="{{ asset('storage/image/Down.PNG')}}" width="60px"
        height="60px" class="logoArrow"></a> --}}
    </div>

    <span id="show">
    <div id="flex-container-article">
     @foreach($articles as $article)
         <div class="positionTitre"><a href="{{url('modifArticles/'.$article->id)}}"><img src="{{ asset('storage/image/'.$article->img) }}" class="cadreImage">
             <div class="voirArticle">
             <span class="flex-container-titre-image titre-article">{{$article->titre}}
              <span class="articleSmartphone">  Voir l'article</span>
             </span>
             </div>

             </a>				
         </div>
     @endforeach
     <div id="btn-nav">
         {{ $articles->links() }}
 </div>
 </div>
 </span>



@include('layout.footer')
