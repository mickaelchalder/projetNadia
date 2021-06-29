@include('layout.header')
    <h1> Tous les Events  :</h1>
    
    @forelse ( $allEvent->all as $events )
    
        <div class="article">
        
            <h1 class="titreArticle">{{$events->titre}}</h1>
            <br>
            <img src="{{ asset('storage/image/'.$events->img) }}" class="cadreImage2">
            <br>
            <h1 class="message">{{$events->message}}</h1>
            <br>
            <br>
            <h3 >{{$events->date}}</h3>

        </div>
    @empty
        <h1>Il n'y a pas d'Evénement</h1>
    @endforelse 

    <a href="{{url('/')}}">retour</a>
@include('layout.footer')