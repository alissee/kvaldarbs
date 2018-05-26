<?php

namespace App\Http\Controllers;
use App\RoleUser;
use Auth;
use App\Device;
use Illuminate\Http\Request;
use Session;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        return view('devices.index')->withDevices($devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleusers = RoleUser::all();

        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=1 ){
            return redirect ('/ierices');
        }
        
        return view('devices.create');

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

        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=1 ){
            return redirect ('/ierices');
        }
        

        
        $this->validate($request, array(
            'device_name' => 'required'
        ));

        if (!$request->hasFile('image')) {

            $device = new Device;
            $device->device_name = $request->device_name;
            $device->description = $request->description;    
            $device->save();
            Session::flash('success', 'Ierīce veiksmīgi pievienota, attēls nav pievienots');
            return redirect()->route('ierices.index');
        }

        $deviceimg=$request->file('image');
        $upload='uploads/deviceimg';
        $filename=$deviceimg->getClientOriginalName();
        $success=$deviceimg->move($upload,$filename);
        $pathtoimg = $upload . '/' . $filename;

        $device = new Device;
        $device->device_name = $request->device_name;
        $device->description = $request->description;
        $device->image_path = $pathtoimg;

        $device->save();
        Session::flash('success', 'Ierīce veiksmīgi pievienota');
        return redirect()->route('device.show', $device->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::find($id);
        return view('devices.show')->withDevice($device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);
        $roleusers = RoleUser::all();
        // echo($roleusers->where('user_id', auth::user()->id)->first()->role_id);
        // die;

        // if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=1 ){
        //     Session::flash('warning', 'Ierīces informāciju var labot tikai administrators!');
        //     return redirect()->route('devices.show', $device->id);

        // }

        return view('devices.edit')->withDevice($device);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, array(
            'device_name' => 'required'
        ));

        $device = Device::find($id);
        $device->device_name = $request->device_name;
        $device->description = $request->description;    
        $device->save();
        Session::flash('success', 'Ierīces informācija veiksmīgi izlabota');
        return redirect()->route('ierices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
}
