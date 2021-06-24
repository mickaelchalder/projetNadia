<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Events</title>
</head>
<body>
    <h1>Events du {{$fecha}} :</h1>
   
    
    
    @forelse ( $event->all as $events )
    
        <h1>{{$events->titre}}</h1>
        <br>
        <img src={{ asset('storage/image/'.$events->img) }}>
        <br>
        <h1>{{$events->message}}</h1>

        <form method="post" action="{{url("supprimer")}}">
            @csrf
            {{method_field('DELETE')}}
            <input type="hidden" name="date" value="{{$fecha}}">
            <input type="hidden" name="img" value="{{$event->img}}">
            <input type="hidden" name="id" value="{{$event->id}}">
            <input type="submit" name="send" value="supprimer">
        </form>
        <form method="post" action="{{url("modifier")}}">
            @csrf
            {{method_field('PUT')}}
            <input type="hidden" name="id" value="{{$event->id}}">
            <input type="submit" name="send" value="modifier">
        </form>
    @empty
        <h1>Il n'y a pas d'Event le {{$fecha}}</h1>
    @endforelse 

     <fieldset>
        <legend>Créer un event </legend>
            <form method="post" action="{{route("banane")}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="date" value="{{$fecha}}">
                <label for="titre">Titre de l'article : </label><input type="text" id="titre" name="titre">
                <input type="file" name="img" class="fileColor">
                <label for="message">Message : </label><textarea type="text" name="message"></textarea>
                <input type="submit" name="send" value="Valider">
                <input type="reset">
            </form>
    </fieldset>
    <a href="{{url('/')}}">retour</a>
        
    
    
</body>
</html>