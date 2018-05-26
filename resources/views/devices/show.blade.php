@extends('main')


@section('titleofpage')
    Apskatīt ierīci
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row individual-post">
        <div class="col-md-12">
<div class="individual-post-body">
<div class="col-md-10 offset-md-1">



        <h1> {{ $device->device_name}} </h1>
        <hr>
        @if($device->image_path)
        <img src="../{{ $device->image_path }}" class="individual-device-img">
        @endif
        <h6> Ierīces apraksts:</h6>
        <p>{{ $device->description }} </p>
        <hr>
        <p>Pievienota: {{ $device->created_at->format('Y-m-d')}}</p>

        @if (Route::has('login'))
            @auth
            <div class="post-btns">
            {!!Html::linkRoute('ierices.edit', 'Rediģēt', array($device->id), array('class' =>'btn btn-outline-warning edit-btnn'))!!}

            {!! Form::open(['route' => ['ierices.destroy', $device->id], 'method' => 'delete']) !!}
            {!! Form::submit('Izdzēst rakstu', ['class' => 'btn btn-outline-danger edit-btnn']) !!}
            {!! Form::close() !!}    
            </div>
            @endauth
        @endif
           
        </div>
        </div>

</div>

    </div>
@endsection