<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
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
          event name, description, organiser's name, and the location of the event. </div><br/><b>Please click on details to see the date and time.<b/><br/><br/>
          <a href="{{ route('display_event') }}">Display Events </a>
    </body>
</html>
