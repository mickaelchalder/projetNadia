<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/calendar.css")}}">
</head>
<body>
    

<div class="container">
    @if ($errors->any())
    problème de d'insertion en base de donnée
    @endif
    
    <div class="month"> 
        
        <div class="left">
            <form action='{{ route('prevRoute') }} ' method='get' >
                <input type='hidden' name='prev' value='{{$date->date}}'>
                <input class='prev buttonMois' type='submit' value='&#10094;' >
                </form>
            </div>
            
            <div class="centre">
                <h5>
                    @foreach ($mois as $key => $value )
                    @if ($key==$date->month)
                    {{$value}}
                    @endif
                    @endforeach
                </h5>
            </div>
            
            <div class="right">    
                <form action='{{ route('nextRoute') }}' method='get' >
                    <input type='hidden' name='next' value='{{$date->date}}'>
                    <input class='next buttonMois' type='submit'  value='&#10095;' >
                </form>
            </div>
        </div>
        
        <div class="year"> 
            
            <div class="left">
                <form action='{{ route('prevRoute') }} ' method='get' >
                    <input type='hidden' name='prev' value='{{$date->date}}'>
                    <input class='prev buttonMois' type='submit' value='&#10094;' >
                </form>
            </div>
            
            <div class="centre">
                <h5>{{$date->year}}</h5>
            </div>
            
            <div class="right">    
                <form action='{{ route('nextRoute') }}' method='get' >
                    <input type='hidden' name='next' value='{{$date->date}}'>
                    <input class='next buttonMois' type='submit'  value='&#10095;' >
                </form>
            </div>
        </div>
        
        <ul class="weekdays">
            @for ($i = 1;$i <= 7;$i++,$premierJour++)
            <li >{{$semaine[$premierJour]}}</li>
            @endfor
        </ul>
        
        <ul class="days">  
            @for($x = 1; $x <= $nbJour; $x++)
            
            <li >
                @if ($x == $date->day ) 
                
                @if (isset($eventa) and in_array($x, $eventa))
                <form action='{{ route('event') }} ' method='get' >
                    <input type='hidden' name='realDate' value='{{date("Y-m-d", mktime(0, 0, 0, $date->month, $date->day, $date->year))}}'>
                    <input type='hidden' name='date' value='{{date("Y-m-d", mktime(0, 0, 0, $date->month, $x, $date->year))}}'>
                    <span class='active'><input class=' event' type='submit' value='{{$x}}' ></span>
                </form>
                @else
                <form action='{{ route('event') }} ' method='get' >
                    <input type='hidden' name='realdate' value='{{date("Y-m-d", mktime(0, 0, 0, $date->month, $date->day, $date->year))}}'>
                    <input type='hidden' name='date' value='{{date("Y-m-d", mktime(0, 0, 0, $date->month, $x, $date->year))}}'>
                    <span class='active'><input class='alldays' type='submit' value='{{$x}}' ></span>
                </form>
                @endif
                
                @elseif ($x > $date->day ) 
                
                @if (isset($eventa) and in_array($x, $eventa))
                <form action='{{ route('event') }} ' method='get' >
                    <input type='hidden' name='realdate' value='{{date("Y-m-d", mktime(0, 0, 0, $date->month, $date->day, $date->year))}}'>
                    <input type='hidden' name='date' value='{{date("Y-m-d", mktime(0, 0, 0, $date->month, $x, $date->year))}}'>
                    <input class=' event' type='submit' value='{{$x}}' >
                </form>
                @else
                <form action='{{ route('event') }} ' method='get' >
                    <input type='hidden' name='realdate' value='{{date("Y-m-d", mktime(0, 0, 0, $date->month, $date->day, $date->year))}}'>
                    <input type='hidden' name='date' value='{{date("Y-m-d", mktime(0, 0, 0, $date->month, $x, $date->year))}}'>
                    <input class='alldays' type='submit' value='{{$x}}' >
                </form>
                @endif
                
                @else
                <p class='beforedays'>{{$x}}</p>
                @endif
            </li>
            
            @endfor
        </ul>
    </div>
    </body>
</html>