@include('layout.header')

	

				<div >
				
				<div >{{$produits->titre}}</div>
				<img src="{{ asset('storage/image/'.$produits->img) }}" >
				<div>{{$produits->message}}</div>

				<div><a href="{{ URL::previous() }}">retour</a></div>
				</div>

@include('layout.footer')
