<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function contactus(){
        return view('contactus');
    }

    // public function newspage(){
    //     return view('news');
    // }

    public function welcomepage(){
        $posts = Post::all()->sortByDesc("created_at");
        return view('welcome')->withPosts($posts);

        // $posts = Post::orderBy('updated_at','desc')->limit(5)->get();
        // return view('welcome')->withPost($posts);
    }

    public function devicespage(){
        return view('devices');
    }

    public function eventspage(){
        return view('events');
    }
}
