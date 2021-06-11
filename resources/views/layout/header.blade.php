<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/formulaire.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>
<body>
    <nav >
        <div class="header_logo ">
            <a href="index.html"><img src="{{asset('storage/image/trans.PNG')}}" width="70px" height="70px" alt="logo"></a>
        </div>
        
        <div class="header_link">
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Event</a>
            </div>
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Article</a>
            </div>
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Produit & Prestation</a>
            </div>
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Newsletter</a>
            </div>
        </div>

        <div class="header_login">
            <div class="header_nav ">
                <a href="index.html" class="header_cadre">Login</a>
            </div>
        </div>
        
    </div>

    <a href="javascript:void(0);" class="header_icon" onclick="openNav()" ><img src="{{asset('storage/image/menu.PNG')}}" width="50px" height="50px" alt="menu"></img></a>

    <div id="myNav" class="header_overlay">
        <a href="javascript:void(0)" class="header_closebtn" onclick="closeNav()">&times;</a>
        <div class="header_overlay-content">
            <a href="index.html">Event</a>
            <a href="index.html">Article</a>
            <a href="index.html">Produit & Prestation</a>
            <a href="index.html">Newsletter</a>
            <a href="index.html">Login</a>
        </div> 
    </div>
</nav>
       
