@include('layout.header')
<body>
<div  class="Form_overlay">
    <a href="{{url('/')}}" class="Form_closebtn" >&times;</a>
    <div class="Form_overlay-content">
        <form  action="{{ url('formulaire') }}" method="post">
          @csrf
            <div >
                <div class="Form_titre">
                  <h2>Un petit message</h2>
                </div>
                <div>
                  <fieldset>
                    <input name="name" type="text" class="Form_control @error('name') is-invalid @enderror"  placeholder="Votre nom..." value="{{ old('name') }}">
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <input name="email" type="email" class="Form_control @error('email') is-invalid @enderror"  placeholder="Votre email..." value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <textarea name="message"  class="Form_control Form_message @error('message') is-invalid @enderror"  placeholder="Votre message..." >{{ old('message') }}</textarea>
                        @error('message')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <button type="submit"  class="Form_btn">Envoyer un message</button>
                  </fieldset>
                </div>
            </div>
        </form>
    </div> 
</div>
@include('layout.footer')                   
