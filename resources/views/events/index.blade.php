@extends('layouts.app')
@section('content')

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
          event name, description, organiser's name, and the location of the event. </div><br/>

          <div class="container">
          <div class="row justify-content-center">
          <div class="col-md-8 ">
          <div class="card">
          <div class="card-header">Display all Events</div>
          <div class="card-body">
          <table class="table table-striped" cellpadding="20px">
          <thead>
          <tr>
          <th>Category</th>
          <th>Event Name</th>
          <th>Description</th>
          <th>Organiser</th>
          <th>Place</th>
          <th colspan="3">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($events as $event)
          <tr>
          <td>{{$event['category']}}</td>
          <td>{{$event['eventname']}}</td>
          <td>{{$event['description']}}</td>
          <td>{{$event['organiser']}}</td>
          <td>{{$event['place']}}</td>
          <td><a href="{{route('events.show', ['event' => $event['id'] ] )}}" class="btn btnprimary">Details</a></td>
          <td><a href="{{ route('events.edit', ['event' => $event['id']]) }}" class="btn btnwarning">Edit</a></td>
          <td>
          <form action="{{ action([App\Http\Controllers\EventController::class, 'destroy'],
          ['event' => $event['id']]) }}" method="post">
           @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button class="btn btn-danger" type="submit"> Delete</button>
          </form>
          </td>
          </tr>
          @endforeach
          </tbody>
          </table>
          </div>
          </div>
          </div>
          </div>
          </div>
          @endsection


    </body>
</html>
