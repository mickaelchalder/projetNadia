<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Events</title>
</head>
<body>
    <h1>modifier l'article du {{$modif->date}}</h1>

    <form method="post" action="{{route("modifEvent")}}" enctype="multipart/form-data">
        <fieldset>
        <legend>modifier la date </legend>
            @csrf
            {!! method_field('PUT') !!}

            <label for="bday">Veuillez saisir la date de l'event :</label>
            <input type="date" name="newDate" value="{{$modif->date}}">
        </fieldset>

        <fieldset>
        <legend>modifier la titre </legend>

            <label for="titre">Titre de l'article : </label><input type="text"  name="newTitre" value="{{$modif->titre}}" >
        </fieldset>

        <fieldset>
            <legend>modifier l'image</legend>
            
            <input type="hidden" name="actualImg" value="{{$modif->img}}">
            <img src={{ asset('storage/image/'.$modif->img) }}>
            <input type="file" name="newImg" class="fileColor"  >
        </fieldset>

        <fieldset>
        <legend>modifier la message </legend>

            <textarea type="textarea" name="newMessage" >{{$modif->message}}</textarea>
        </fieldset>

        <input type="hidden" name="id" value="{{ $modif->id }}">

            <input type="submit" name="send" value="Valider">
            <input type="reset">
        </form>
    
        <form action='{{ url('event') }} ' method='post' >
            @csrf
            <input type='hidden' name='date' value='{{$fecha}}'>
            <input  type='submit' value='retour' >
        </form>
    
</body>
</html>

