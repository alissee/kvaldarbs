<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\RoleUser;

class IssueController extends Controller
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
            return redirect ('/');
        }

        $issues = Issue::all();
        return view('contactus.index')->withIssues($issues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactus.create');

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
            'theme' => 'required|max:255',
            'message' => 'required'
        ));
        // $photoName = time().'.'.$request->post_photo->getClientOriginalExtension();

        $issue = new Issue;
        $issue->name = $request->name;
        $issue->email = $request->email;
        $issue->theme = $request->theme;
        $issue->message = $request->message;
        $issue->save();

        // $request->user_photo->move(public_path('img'), $photoName);

        Session::flash('success', 'Ziņa veiksmīgi iesniegta');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $roleusers = RoleUser::all();
        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) != 1 ){
            return redirect ('/');
        }

        $issue = Issue::find($id);
        return view('contactus.show')->withIssue($issue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'create', 'store']]);
    }
}
