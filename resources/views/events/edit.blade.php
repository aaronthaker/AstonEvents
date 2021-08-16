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
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8 ">
        <div class="card">
        <div class="card-header">Edit and update the event</div>
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div><br />
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif
        <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('events.update', ['event' =>
        $event['id']]) }}" enctype="multipart/form-data" >
         @method('PATCH')
        @csrf

        <div class="col-md-8">
        <label >Event Category</label>
        <input type="text" name="category" value="{{$event->category}}"/>
        </div>

        <div class="col-md-8">
        <label >Event Name</label>
        <input type="text" name="eventname" value="{{$event->eventname}}"/>
        </div>

        <div class="col-md-8">
        <label >Description</label>
        <textarea rows="4" cols="50" name="description" > {{$event->description}}
        </textarea>
        </div>

        <div class="col-md-8">
        <label >Organiser</label>
        <input type="text" name="organiser" value="{{$event->organiser}}" />
        </div>

        <div class="col-md-8">
        <label >Place</label>
        <input type="text" name="place" value="{{$event->place}}" />
        </div>

        <div class="col-md-6 col-md-offset-4">
        <input type="submit" class="btn btn-primary" />
        <input type="reset" class="btn btn-primary" />
        </a>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        @endsection

    </body>
</html>
