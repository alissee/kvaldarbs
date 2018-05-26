@extends('main')


@section('titleofpage')
    Rezervēt ierīci
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row contact-us-section">
        <div class="col-md-12">

            <div class="col-md-10 offset-md-1">

            <h2> Rezervēt ierīci "{{ $devices[$_GET['id']-1]->device_name }}"</h2>

            <hr>

            <p>Ierīces nosaukums: "{{ $devices[$_GET['id']-1]->device_name }}"</p>
            <p>Rezervācijas veicējs: {{ Auth::user()->name }}</p>

                {!! Form::open(['route' => 'iericesrezervacija.store', 'enctype' => 'multipart/form-data']) !!}
            <div style= 'display:none'>
                    {!! Form::label('device_id', 'Ierīces nosaukums:') !!}
                    {!! Form::text('device_id', "$_GET[id]", array('class' => 'form-control', 'required')) !!}

            </div>
                    {!! Form::label('date', 'Datums:') !!}
                    {!! Form::date('date', null, array('required')) !!}
                    <br>
                    {!! Form::label('time', 'Laiks:') !!}
                    {!! Form::time('time', null, array('required')) !!}
                    <br>

                <hr>
                    {!! Form::submit('Veikt rezervāciju', array('class' => 'btn btn-outline-success ')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection