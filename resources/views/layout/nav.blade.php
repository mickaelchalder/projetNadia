<body id="Jordan">
    <nav class='nav'>
        
        <div class="header_logo ">
            <a href="index.html"><img src="{{asset('storage/image/trans.PNG')}}" class='header_img_logo' width="70px" height="70px" alt="logo"></a>
        </div>
        
        <div class="header_link">
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Calendrier</a>
            </div>
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Article</a>
            </div>
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Produit & Prestation</a>
            </div>
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Histoire</a>
            </div>
        </div>

        <div class="header_login">
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Login</a>
            </div>
        </div>
        

    <a href="javascript:void(0);" class="header_icon" onclick="openNav()" ><img src="{{asset('storage/image/menu.PNG')}}" width="50px" height="50px" alt="menu"></img></a>

    <div id="myNav" class="header_overlay">
        <a href="javascript:void(0)" class="header_closebtn" onclick="closeNav()">&times;</a>
        <div class="header_overlay-content">
            <a href="index.html">Calendrier</a>
            <a href="index.html">Article</a>
            <a href="index.html">Produit & Prestation</a>
            <a href="index.html">Newsletter</a>
            <a href="index.html">Login</a>
        </div> 
    </div>

</nav>
<a href="{{url('formulaire')}}" class="Form_icon"  ><img src="{{asset('storage/image/letter.PNG')}}" width="60px" height="60px" alt="formulaire"></a>

<a href="{{url('formulaire')}}" class="Form_icon2"  ><img src="{{asset('storage/image/newsletter.PNG')}}" width="60px" height="60px" alt="formulaire"></a>
       
