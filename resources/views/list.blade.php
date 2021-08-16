<table style = "width:25%">
 <thead>
 <tr>
 <th> Event ID</th>
 <th> Account no</th>
 <th> Type </th>
 <th> balance </th>
 <th> Interest</th>
 </tr>
 </thead>
 <tbody>
 @foreach($event as $event)
 <tr>
 <td> {{$event->id}} </td>
 <td> {{$event->category }} </td>
 <td> {{$event->description }} </td>
 <td> {{$event->organiser}} </td>
 <td> {{$event->place}} </td>

 </tr>
 @endforeach
 </tbody>
</table>
