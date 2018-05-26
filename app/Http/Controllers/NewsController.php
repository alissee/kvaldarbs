<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Auth;
use File;
use App\RoleUser;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc("created_at");
        return view('news.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roleusers = RoleUser::all();

        if (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=( 1 || 3 || 4) ){
            return redirect ('/jaunumi');
        }
        
        return view('news.create');
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
            'title' => 'required|max:255',
            'body' => 'required'
        ));
        if (!$request->hasFile('image')) {
            $post = new Post;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->user_id = auth::user()->id;
            $post->save();
            Session::flash('success', 'Raksts veiksmīgi izveidots');
            return redirect()->route('jaunumi.show', $post->id);
        }

        $postimg=$request->file('image');
        $upload='uploads/jaunumi/img';
        $filename=$postimg->getClientOriginalName();
        $success=$postimg->move($upload,$filename);
        $pathtoimg = $upload . '/' . $filename;

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image_path = $pathtoimg;
        $post->user_id = auth::user()->id;
        $post->save();
        Session::flash('success', 'Raksts veiksmīgi izveidots');
        return redirect()->route('jaunumi.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('news.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $roleusers = RoleUser::all();

        if (($post->user_id != auth::user()->id) || (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=1 )){
            Session::flash('warning', 'Rakstu var labot tikai raksta autors vai administrators!');
            return redirect()->route('jaunumi.show', $post->id);

        }
        // dd($post);
        return view('news.edit')->withPost($post);
        

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
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ));

            $post = Post::find($id);
            $post->title = $request->title;
            $post->body = $request->body;
            $post->user_id = auth::user()->id;
            $post->save();
            Session::flash('success', 'Izmaiņas veiksmīgi saglabātas');
            return redirect()->route('jaunumi.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $roleusers = RoleUser::all();

        if (($post->user_id != auth::user()->id) || (($roleusers->where('user_id', auth::user()->id)->first()->role_id) !=1 )){
            Session::flash('warning', 'Rakstu var izdzēst tikai raksta autors vai administrators!');
            return redirect()->route('jaunumi.show', $post->id);

        }
        $filename = $post->image_path;
        File::delete($filename);
        $post->delete();
        
        Session::flash('success', 'Ieraksts veiksmīgi izdzēsts!');
        return redirect()->route('jaunumi.index');

        //
    }


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
}
