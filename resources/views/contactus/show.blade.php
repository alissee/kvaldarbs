@extends('main')


@section('titleofpage')
    Pievienot jaunu ziņu
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row individual-post">
        <div class="col-md-12">
        <a class="btn btn-outline-secondary styled-btn" href="{{ route('sazinies.index') }}">&#8592;	Atpakaļ</a>

<div class="individual-post-body">
<div class="col-md-10 offset-md-1">


        <h4> {{ $issue->theme }} </h4>
        <hr>
        <p> {{ $issue->message }} </p>
        <hr>
        <p>Ziņas autors: {{ $issue->name }}</p>
        <p>E-pasts: {{ $issue->email }}</p>
        <p>Datums: {{ $issue->created_at->format('d.m.Y')}}</p>

        @if (Route::has('login'))
            @auth
            @endauth
        @endif
           
        </div>
        </div>

</div>

    </div>
@endsection