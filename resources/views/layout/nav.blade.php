<body id="Jordan">
    <nav class='nav'>
        
        <div class="header_logo ">
            <a href="index.html"><img src="{{asset('storage/image/trans.PNG')}}" class='header_img_logo' width="70px" height="70px" alt="logo"></a>
        </div>
        
        <div class="header_link">
            <div class=" navbar ">
                <div class="  dropdown ">
                    <span class="dropbtn">Histoire 
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <div class="dropdown-content">
                      <a href="#">Bio</a>
                      <a href="#">Hommage</a>
                    </div>
                  </div> 
            </div>
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Article</a>
            </div>
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Prestation</a>
            </div>
            <div class=" navbarCalendar ">
                <div class="dropdownCalendar ">
                    <span class="dropbtn">Calendrier
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <div class="dropdownCalendar-content">
                        @if ($calendrier===true)
                            @include('calendrier')
                        @else
                            @include('nextCalendrier')
                        @endif
                    </div>
                  </div> 
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
            <a href="index.html">Prestation</a>
            <a href="index.html">Newsletter</a>
            <a href="index.html">Contact</a>
            <a href="index.html">Bio</a>
            <a href="index.html">Hommage</a>
            <a href="index.html">Login</a>
        </div> 
    </div>

</nav>
<a href="{{url('formulaire')}}" class="Form_icon"  ><img src="{{asset('storage/image/letter.PNG')}}" width="60px" height="60px" alt="formulaire"></a>

<a href="{{url('newsletter')}}" class="Form_icon2"  ><img src="{{asset('storage/image/newsletter.PNG')}}" width="60px" height="60px" alt="newsletter"></a>
       
