<?php

namespace App\Http\Controllers;
use App\Device;
use App\User;
use Session;
use App\DeviceReservation;
use Illuminate\Http\Request;
use Auth;
use App\RoleUser;
use App\Mail\Response;
use App\Mail\ResponseFalse;

class DeviceReservationController extends Controller
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
            return redirect ('/ierices');
        }

        $deviceReservations = \App\DeviceReservation::all()->sortByDesc("created_at");
        $devices = Device::all();
        $users = User::all();

        return view('device_reservation.index')->withDeviceReservations($deviceReservations)->withDevices($devices)->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roleusers = RoleUser::all();

        if (Auth::guest()){     
        return redirect ('/login');
        }

        $devices = Device::all();
        return view('device_reservation.create')->withDevices($devices);

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
        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=(1||2||3||4) ){
            return redirect ('/login');

        }
            $this->validate($request, array(
            'device_id' => 'required',
            'date' => 'required',
            'time' => 'required'
        ));
        // $photoName = time().'.'.$request->post_photo->getClientOriginalExtension();

        $deviceReservation = new DeviceReservation;
        $deviceReservation->device_id = $request->device_id;
        $deviceReservation->user_id = Auth::user()->id;
        $deviceReservation->date = $request->date;
        $deviceReservation->time = $request->time;
        $deviceReservation->save();

        // $request->user_photo->move(public_path('img'), $photoName);

        Session::flash('success', 'Rezervācija veiksmīgi izveidota! Gaidiet atbildi!');
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeviceReservation  $deviceReservation
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceReservation $deviceReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeviceReservation  $deviceReservation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roleusers = RoleUser::all();
        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) != 1 ){
            return redirect ('/ierices');

        }
        
        // print_r($id);
        // die;
        $deviceReservation = \App\DeviceReservation::find($id);
        // dd($post);
        return view('device_reservation.edit')->withDeviceReservation($deviceReservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeviceReservation  $deviceReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roleusers = RoleUser::all();

        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) != 1 ){
            return redirect ('/ierices');

        }

        $this->validate($request, array(
            'answer' => 'required'
        ));
        
            $deviceReservation = DeviceReservation::find($id)->first();
            // dd($deviceReservation);
            // die;
            // dd($request);
            // die;
            $deviceReservation->answer = $request->answer;
            $deviceReservation->save();
            
            Session::flash('success', 'Atbilde veiksmīgi saglabāta');
            
            if(($request->answer) == 1){
            $mailto = User::where('id',$deviceReservation->user_id) -> first()->email;
            \Mail::to($mailto)->send(new Response);
            }
            else{
                $mailto = User::where('id',$deviceReservation->user_id) -> first()->email;
                \Mail::to($mailto)->send(new ResponseFalse);
            }
            return redirect()->route('iericesrezervacija.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeviceReservation  $deviceReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceReservation $deviceReservation)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
