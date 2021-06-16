@include('layout.header')
<a href="javascript:void(0);" class="Form_icon" onclick="openForm()" ><img src="{{asset('storage/image/letter.PNG')}}" width="60px" height="60px" alt="formulaire"></img></a>
<div id="myForm" class="Form_overlay">
    <a href="javascript:void(0)" class="Form_closebtn" onclick="closeForm()">&times;</a>
    <div class="Form_overlay-content">
        <form  action="" method="post">
            <div >
                <div class="Form_titre">
                  <h2>Un petit message</h2>
                </div>
                <div>
                  <fieldset>
                    <input name="name" type="text" class="Form_control"  placeholder="Votre nom..." >
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <input name="email" type="email" class="Form_control"  placeholder="Votre email..." >
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <textarea name="message"  class="Form_control Form_message"  placeholder="Votre message..." ></textarea>
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