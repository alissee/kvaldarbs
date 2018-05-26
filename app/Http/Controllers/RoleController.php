<?php

namespace App\Http\Controllers;
use \Spatie\GoogleCalendar\Event;
use App\User;
use App\Role;
use Auth;
use App\RoleUser;
use Carbon;
use Session;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {

        $users = User::all();
        $roles = Role::all();
        $roleusers = RoleUser::all();

        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=(1 || 3 || 4) ){
            return redirect ('/');
        }
    

//         foreach ($roleusers as $userrole){
// echo $userrole;
//         }
// die;

        // echo $roleusers->where('user_id', auth::user()->id)->first()->role_id;
        // die;
        // $usrrole = Role::where('page', 'about-me')->first();

        return view('roles.index')->withUsers($users)->withRoles($roles)->withRoleusers($roleusers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $this->validate($request, array(
            'name' => 'required'
        ));
        // $photoName = time().'.'.$request->post_photo->getClientOriginalExtension();

        $role = new Role;
        $role->name = $request->name;

        $role->save();

        Session::flash('success', 'Lietotāja loma veiksmīgi pievienota');
        return redirect()->route('lomas.index');
    }

    public function show(Role $id)
    {
        $usrrole = Role::all();
        // dd($usrrole[0]);
        $adminname = $usrrole['0']['name'];
        $adminid = $usrrole['0']['id'];

        $user = $usrrole->where('name', 'user')->first();
        $students = $usrrole->where('name', 'students')->first();
        $pasniedzejs = $usrrole->where('name', 'pasniedzejs')->first();
        
        $user = User::find($id);
        // dd($post);
        return view('lomas.edit')->withUser($user)->withRole($usrrole);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roleusers = RoleUser::all();
        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) != 1 ){
            return redirect ('/pasakumi');

        }

        $user = User::find($id);
        // dd($post);
        return view('roles.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $roleusers = RoleUser::all();

        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) != 1 ){
            return redirect ('/pasakumi');

        }

        $this->validate($request, array(
            'answer' => 'required',
            'user_id_of' => 'required'
        ));
        
            $userid = $request->user_id_of;
            $roleId = $request->answer;
            $userto = \App\User::find($userid);
            $oldval = $userto->role;
            $userto->roles()->detach($oldval);
            $userto->roles()->attach($roleId);

            
            Session::flash('success', 'Lietotāja loma veiksmīgi nomainīta');
            
            return redirect()->route('lomas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
