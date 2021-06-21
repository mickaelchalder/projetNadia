@extends('nav')

@section('nextCalendrier')
    <div class="container">
        <div class="month"> 

            <div class="left">
                <form action='{{ route('prevRoute') }} ' method='get' >
                    <input type='hidden' name='prev' value='{{$newDate->newDate}}'>
                    <input class='prev buttonMois' type='submit' value='&#10094;' >
                </form>
            </div>
            
            <div class="centre">
                <h5>
                    @foreach ($mois as $key => $value )
                    @if ($key==$newDate->newMonth)
                    {{$value}}
                    @endif
                    @endforeach
                </h5>
            </div>
            
            <div class="right">    
                <form action='{{ route('nextRoute') }}' method='get' >
                    <input type='hidden' name='next' value='{{$newDate->newDate}}'>
                    <input class='next buttonMois' type='submit'  value='&#10095;' >
                </form>
            </div>
        </div>

        <div class="year"> 

            <div class="left">
                <form action='{{ route('prevYear') }} ' method='get' >
                        <input type='hidden' name='prevYear' value='{{$newDate->newDate}}'>
                        <input class='prev buttonMois' type='submit' value='&#10094;' >
                </form>
            </div>

            <div class="centre">
                <h5>{{$newDate->newYear}}</h5>
            </div>

            <div class="right">    
                <form action='{{ route('nextYear') }}' method='get' >
                        <input type='hidden' name='nextYear' value='{{$newDate->newDate}}'>
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
                        @if ($x == $calendar->day and $calendar->month === $newDate->newMonth and $calendar->year === $newDate->newYear)
                          
                            @if (isset($nextEventa) and in_array($x, $nextEventa))
                                <form action='{{ route('event') }} ' method='get' >
                                    <input type='hidden' name='realdate' value='{{date("Y-m-d", mktime(0, 0, 0, $calendar->month, $calendar->day, $calendar->year))}}'>
                                    <input type='hidden' name='date' value='{{date("Y-m-d", mktime(0, 0, 0, $newDate->newMonth, $x, $newDate->newYear))}}'>
                                    <span class='active'><input class='event' type='submit' value='{{$x}}' ></span>
                                </form>
                            @else
                                <form action='{{ route('event') }} ' method='get' >
                                    <input type='hidden' name='realdate' value='{{date("Y-m-d", mktime(0, 0, 0, $calendar->month, $calendar->day, $calendar->year))}}'>
                                    <input type='hidden' name='date' value='{{date("Y-m-d", mktime(0, 0, 0, $newDate->newMonth, $x, $newDate->newYear))}}'>
                                    <span class='active'><input class='alldays' type='submit' value='{{$x}}' ></span>
                                </form>
                            @endif

                        @elseif (($x > $calendar->day and $calendar->month <= $newDate->newMonth and $calendar->year <= $newDate->newYear)or($x <= $calendar->day and $calendar->month < $newDate->newMonth and $calendar->year <= $newDate->newYear)or($x < $calendar->day and $calendar->month = $newDate->newMonth and $calendar->year < $newDate->newYear)) 

                            @if (isset($nextEventa) and in_array($x, $nextEventa))
                                <form action='{{ route('event') }} ' method='get' >
                                    <input type='hidden' name='realdate' value='{{date("Y-m-d", mktime(0, 0, 0, $calendar->month, $calendar->day, $calendar->year))}}'>
                                    <input type='hidden' name='date' value='{{date("Y-m-d", mktime(0, 0, 0, $newDate->newMonth, $x, $newDate->newYear))}}'>
                                    <input class='event' type='submit' value='{{$x}}' >
                                </form>
                            @else
                                <form action='{{ route('event') }} ' method='get' >
                                    <input type='hidden' name='realdate' value='{{date("Y-m-d", mktime(0, 0, 0, $calendar->month, $calendar->day, $calendar->year))}}'>
                                    <input type='hidden' name='date' value='{{date("Y-m-d", mktime(0, 0, 0, $newDate->newMonth, $x, $newDate->newYear))}}'>
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
@endsection


 