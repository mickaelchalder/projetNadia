@include('layout.header')
<div class="background-hommage">

	@auth
	<h1 class="h1-hommage">Ajouter un hommage</h1>

		<form method="post" action="{{url("addHommage")}}" enctype="multipart/form-data">
	<div>
		{{csrf_field()}}
		<span ><div><label for="titre">Titre de l'hommage : </label></div>
		@error('titre')
            <div class="invalid-feedback-hommage">{{ $message }}</div>
        @enderror<input type="text" id="titre" name="titre" value="{{ old('titre') }}"></span>
        @error('img')
            <div class="invalid-feedback-hommage">{{ $message }}</div>
        @enderror
		<span><input type="file" name="img"></span>
		<span><div><label for="message">Message : </label></div>
			@error('message')
                <div class="invalid-feedback-hommage">{{ $message }}</div>
            @enderror
			<textarea type="text" name="message" cols="70" rows="20" >{{ old('message') }}</textarea></span>
		<input type="submit" name="send" value="Valider">
		<input type="reset">
	</div>
	</form>
	@endauth

<div class="div-back"><a href="{{url('/')}}" class="div-back-btn">&times;</a></div>

	@auth
		@foreach($hommages as $hommage)
		
		<form action="{{url('hommages/'.$hommage->id)}}" method="post">
				{{csrf_field()}}
				{!!method_field('DELETE')!!}
		
		<input type="hidden" name="id" value="{{$hommage->id}}">
				<img src="{{ asset('storage/image/'.$hommage->img) }}">
						<h2 >{{$hommage->titre}}</h2>
						<div>{!!nl2br($hommage->message)!!}</div>
		
		<button>Supprimer</button>
			</form>

		<form action="{{ url('hommages/'.$hommage->id) }}" method="GET">
            <div><button>
                Modifier
            </button></div>			
        </form>
		@endforeach
	@endauth

	@guest
		@foreach($hommages as $hommage)
		<div class="pc-hommage">
		<img src="{{ asset('storage/image/'.$hommage->img) }}" class="img-hommage">
		<h2 class="titre-hommage">{{$hommage->titre}}</h2>
		<div class="message-hommage">{!!nl2br($hommage->message)!!}</div>
		</div>
		<div class="container-flex-container-liseret"><img src="{{asset('storage/image/liseret_hommage.png')}}" class="liseret_hommage"></div>
		
		@endforeach
	@endguest

</div>
@include('layout.footer')