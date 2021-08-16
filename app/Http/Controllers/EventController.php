<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Gate;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function show($id){
         $event = Event::find($id);
         return view('/show', array('event' => $event));
         }
         public function list(){
         return view('/list', array('event'=>Event::all()));

         $event = Event::find($id);
         return view('events.show',compact('event'));
   }

   public function display() {
          $eventsQuery = Event::all();
     #     if (Gate::denies('displayall')) {
     #     $eventsQuery=$eventsQuery->where('userid', auth()->user()->id);
     #     }
          return view('/display', array('events'=>$eventsQuery));
          }

    public function index()
    {
        $events = Event::all()->toArray();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // form validation
        $event = $this->validate(request(), [
        'category' => 'required',
        'eventname' => 'required',
        'description' => 'required',
        'organiser' => 'required',
        'place' => 'required',
        ]);
        //Handles the uploading of the image
        //////
        // create a Vehicle object and set its values from the input
        $event = new Event;
        $event->category = $request->input('category');
        $event->eventname = $request->input('eventname');
        $event->description = $request->input('description');
        $event->organiser = $request->input('organiser');
        $event->place = $request->input('place');
        // save the Vehicle object
        $event->save();
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'Event has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
      $event = Event::find($id);
      return view('events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $event = Event::find($id);
      $this->validate(request(), [
      'category' => 'required',
      'eventname' => 'required',
      'description' => 'required',
      'organiser' => 'required',
      'place' => 'required'
      ]);
      $event->category = $request->input('category');
      $event->eventname = $request->input('eventname');
      $event->description = $request->input('description');
      $event->organiser = $request->input('organiser');
      $event->place = $request->input('place');
      //Handles the uploading of the image
      $event->save();
      return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $event = Event::find($id);
      $event->delete();
      return redirect('events');

    }
}
