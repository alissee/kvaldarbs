<?php

namespace App\Http\Controllers;
use Carbon;
use App\Plan;
use Illuminate\Http\Request;
use \Spatie\GoogleCalendar\Event;
use Session;
use Auth;
use App\RoleUser;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events  = Event::get()->sortByDesc("start['dateTime']");
        
        return view('events.index')->withEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleusers = RoleUser::all();
        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) != 1 ){
            return redirect ('/pasakumi');
        }
        
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
        $this->validate($request, array(
            'start' => 'date_format:"Y-m-d H:i:s"|required',
            'end' => 'date_format:"Y-m-d H:i:s"|required',
            'name' => 'required'
        ));

        $event = new Event;
        $event->name = $request->name;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->startDateTime = Carbon\Carbon::parse($request->start);
        $event->endDateTime = Carbon\Carbon::parse($request->end);
        $event->save();


        $plan = new Plan;
        $plan->name = $request->name;
        $plan->start = $request->start;
        $plan->end = $request->end;
        $plan->description = $request->description;
        $plan->location = $request->location;
        $plan->save();


        Session::flash('success', 'Pasākums veiksmīgi pievienots Google Calendar');
        return redirect()->route('pasakumi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $event  = Event::find($id);
        // dd($event);
        // die;
        return view('events.edit')->withEvent($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'start' => 'date_format:"Y-m-d H:i:s"|required',
            'end' => 'date_format:"Y-m-d H:i:s"|required',
            'name' => 'required'
        ));

        $event = Event::find($id);
        $event->name = $request->name;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->startDateTime = Carbon\Carbon::parse($request->start);
        $event->endDateTime = Carbon\Carbon::parse($request->end);
        $event->save();

        Session::flash('success', 'Pasākuma informācija veiksmīgi izlabota un pievienota Google Calendar');
        return redirect()->route('pasakumi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($eventId)
    {
        $event = Event::find($eventId);
        $event->delete();
        Session::flash('success', 'Pasākums veiksmīgi izdzēsts!');
        return redirect()->route('pasakumi.index');
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
}
