@include('layout.header')

<form action="{{ url('modifHommage') }}" method="POST" enctype="multipart/form-data">

{{ csrf_field() }}
{!! method_field('PUT') !!}
<input type="hidden" name="id" value="{{ $hommageModif->id }}">
    <h1 class="h1-article">Hommage</h1>
    <div class="article">
        <div>
        @error('titre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input type ='text' value='{{$hommageModif->titre}}' name="titre" class="titreArticle"></input>
        @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div><br>
        @error('img')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            <img src="{{ asset('storage/image/'.$hommageModif->img) }}" class="cadreImage2"><br>
            <input type="hidden" name="img2" value="{{$hommageModif->img}}"/>
            <input type="file" name="img"/><br>
            <textarea type="text" name="message" class="message">{{$hommageModif->message}}</textarea>
            <br>
        <div><input type="submit" name="modif" value="Modifier"></div>
        <div><a href="{{ route('listeH') }}" class="lien-color">retour</a></div>

    </div>
</form>