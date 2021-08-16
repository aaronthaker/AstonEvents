<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
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
        <div class="col-md-10 ">
         <div class="card">
         <div class="card-header"><b/>Create Event: </b></div><br/>
        <!-- display the errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul> @foreach ($errors->all() as $error)
        <li>{{ $error }}</li> @endforeach
        </ul>
        </div><br /> @endif
        <!-- display the success status -->
        @if (\Session::has('success'))
        <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
        </div><br /> @endif
         <!-- define the form -->
        <div class="card-body">
        <form class="form-horizontal" method="POST"
        action="{{url('events') }}" enctype="multipart/form-data">
        @csrf

         <div class="col-md-8">
         <label >Event category </label>
        <input type="text" name="category"
        placeholder="Event Category" />
         </div><br/>

        <div class="col-md-8">
        <label >Event Name</label>
        <input type="text" name="eventname"
        placeholder="Event Name" />
        </div><br/>

        <div class="col-md-8">
        <label >Description</label>
        <textarea rows="4" cols="50" name="description"> Notes about the
        event </textarea>
        </div><br/>

        <div class="col-md-8">
        <label >Organiser</label>
        <input type="text" name="organiser"
        placeholder="Event Organiser" />
        </div><br/>

        <div class="col-md-8">
        <label >Place</label>
        <input type="text" name="place"
        placeholder="Place" />
        </div><br/>

        <div class="col-md-6 col-md-offset-4">
        <input type="submit" class="btn btn-primary" />
        <input type="reset" class="btn btn-primary" />
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
