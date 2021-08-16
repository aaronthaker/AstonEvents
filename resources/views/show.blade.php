<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Event ID {{ $event->id }}</title>
            <style>
                    body { background-color: linen }
                    .test { text-align:right; }
                    .welcome { text-align:center; }
              </style>
    </head>
    <body>
      <h1 class = "welcome"> Welcome to Aston Events! </h1>

        <div class = "test">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a><br/>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register to be an Event Organiser</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <h3> Welcome! Please have a look at the events we are offering! </h3>
        <div> Also, register using the form on the right if you'd like to be an event organiser. </div><br/>
        <div> Below we have listed all of the events that are currently in our database. Click on 'details' if you'd like to see more information, such as the event category,
          event name, description, organiser's name, and the location of the event. </div><br/>
          <body>
          <h1>Category: {{ $event->category }}</h1><br/>
          <ul>
          <ul><b>Eventname:</b> {{ $event->eventname }}</ul><br/>
          <ul><b>Description: </b>{{ $event->eventname }}</ul><br/>
          <ul><b>Organiser:</b> {{ $event->organiser }}</ul><br/>
          <ul><b>Place:</b> {{ $event->place }}</ul><br/>
          <div><b>Date: <?php
          $day = rand(1, 30);
          $month = rand(1,12);
          ?> <?= $day ?> - <?= $month ?>- 2022
        </div><br/>
        <div><b>Time: <?php
        $hr = rand(2, 10);
        $min = rand(1,60);
        ?> <?= $hr ?>:<?= $min ?>pm
        </div><br/>

          Contact {{ $event->organiser }} at 0<?php echo rand(111111111, 9999999999); ?>


    </body>
</html>
