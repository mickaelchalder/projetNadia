@include('layout.header')
<a href="javascript:void(0);" class="Form_icon" onclick="openForm()" ><img src="{{asset('storage/image/letter.PNG')}}" width="60px" height="60px" alt="formulaire"></img></a>
<div id="myForm" class="Form_overlay">
    <a href="javascript:void(0)" class="Form_closebtn" onclick="closeForm()"> <span class="croix">&times;</span></a>
    <div class="Form_overlay-content">
        <form  action="" method="post">
            <div >
                <div class="Form_titre">
                  <h2>Un petit message</h2>
                </div>
                <div>
                  <fieldset>
                    <input name="name" type="text" class="Form_control"  placeholder="Your name..." >
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <input name="email" type="email" class="Form_control"  placeholder="Your email..." >
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <textarea name="message"  class="Form_control Form_message"  placeholder="Your message..." ></textarea>
                  </fieldset>
                </div>
                <div>
                  <fieldset>
                    <button type="submit"  class="Form_btn">Send Message Now</button>
                  </fieldset>
                </div>
            </div>
        </form>
    </div> 
</div>
@include('layout.footer')