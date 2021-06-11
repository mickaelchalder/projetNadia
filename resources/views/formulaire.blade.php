@include('layout.header')
<a href="javascript:void(0);" class="Form_icon" onclick="openForm()" ><img src="{{asset('storage/image/letter.PNG')}}" width="60px" height="60px" alt="formulaire"></img></a>
<div id="myForm" class="form_overlay">
    <a href="javascript:void(0)" class="Form_closebtn" onclick="closeForm()">&times;</a>
    <div class="Form_overlay-content">
        <a href="index.html">Event</a>
        <a href="index.html">Article</a>
        <a href="index.html">Produit & Prestation</a>
        <a href="index.html">Newsletter</a>
        <a href="index.html">Login</a>
    </div> 
</div>
@include('layout.footer')