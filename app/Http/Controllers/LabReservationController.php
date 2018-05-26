<?php

namespace App\Http\Controllers;
use App\RoleUser;
use App\User;
use Auth;
Use Session;
use App\LabReservation;
use Illuminate\Http\Request;
use App\Mail\Response;
use App\Mail\ResponseFalse;

class LabReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleusers = RoleUser::all();
        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) != 1 ){
            return redirect ('/pasakumi');
        }

        $labReservations = \App\LabReservation::all()->sortByDesc("created_at");
        $users = User::all();

        return view('labreservation.index')->withLabReservations($labReservations)->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleusers = RoleUser::all();

        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=(1||3||4)  ){
            return redirect ('/pasakumi');
        }
        
        return view('labreservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roleusers = RoleUser::all();
        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=(1||3||4) ){
            return redirect ('/login');

        }
            $this->validate($request, array(
            'date' => 'required',
            'start' => 'required',
            'end' => 'required'
        ));

        $labReservation = new LabReservation;
        $labReservation->user_id = Auth::user()->id;
        $labReservation->date = $request->date;
        $labReservation->start = $request->start;
        $labReservation->end = $request->end;
        $labReservation->save();

        Session::flash('success', 'Rezervācija veiksmīgi izveidota! Gaidiet atbildi!');
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LabReservation  $labReservation
     * @return \Illuminate\Http\Response
     */
    public function show(LabReservation $labReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LabReservation  $labReservation
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
        $roleusers = RoleUser::all();
        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) != 1 ){
            return redirect ('/pasakumi');

        }

        $labReservation = \App\LabReservation::find($id);
        // dd($post);
        return view('labreservation.edit')->withLabReservation($labReservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LabReservation  $labReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roleusers = RoleUser::all();

        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) != 1 ){
            return redirect ('/pasakumi');

        }

        $this->validate($request, array(
            'answer' => 'required'
        ));
        
            $labReservation = LabReservation::find($id)->first();

            $labReservation->answer = $request->answer;
            $labReservation->save();
            
            Session::flash('success', 'Atbilde veiksmīgi saglabāta');
            
            if(($request->answer) == 1){
            $mailto = User::where('id',$labReservation->user_id) -> first()->email;
            \Mail::to($mailto)->send(new Response);
            }
            else{
                $mailto = User::where('id',$labReservation->user_id) -> first()->email;
                \Mail::to($mailto)->send(new ResponseFalse);
            }
            return redirect()->route('telpasrezervacija.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LabReservation  $labReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabReservation $labReservation)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
