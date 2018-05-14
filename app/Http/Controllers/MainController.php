<?php

namespace App\Http\Controllers;

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
        return view('welcome');
    }

    public function devicespage(){
        return view('devices');
    }

    public function eventspage(){
        return view('events');
    }
}
