@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header">Display all events</div>
<div class="card-body">
<table class="table table-striped" border="1" >
<tr> <td> <b>Category </th> <td> {{$event['category']}}</td></tr>
<tr> <th>Event Name </th> <td>{{$event['eventname']}}</td></tr>
<tr> <th>Event Description </th> <td style="max-width:150px;" >{{$event->description}}</td></tr>
<tr> <td>Organiser </th> <td>{{$event->organiser}}</td></tr>
<tr> <th>Place </th> <td>{{$event->place}}</td></tr>
</table>
<table><tr>
<td><a href="{{route('events.index')}}" class="btn btn-primary" role="button">Back to the
list</a></td>
<td><a href="{{ route('events.edit', ['event' => $event['id']]) }}" class="btn btnwarning">Edit</a></td>
<td><form action="{{ route('event.destroy', ['event' => $event['id']]) }}"
method="post"> @csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger" type="submit">Delete</button>
</form></td>
</tr></table>
</div>
</div>
</div>
</div>
</div>
@endsection
