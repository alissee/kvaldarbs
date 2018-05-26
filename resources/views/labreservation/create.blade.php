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

            <h2>Rezervēt DF LAB telpu"</h2>
            <small>Ja pieteikums tiks apsiprināts, šī informācija uzrādīsies "Pasākumu sadaļā" un LU DF Google Kalendārā</small>

            <hr>

            <p>Rezervācijas veicējs: {{ Auth::user()->name }}</p>

                {!! Form::open(['route' => 'telpasrezervacija.store']) !!}

                    {!! Form::label('date', 'Datums:') !!}
                    {!! Form::date('date', null, array('required')) !!}
                    <br>
                    {!! Form::label('start', 'Sākuma laiks:') !!}
                    {!! Form::time('start', null, array('required')) !!}
                    <br>
                    {!! Form::label('end', 'Beigu laiks:') !!}
                    {!! Form::time('end', null, array('required')) !!}
                    <br>

                <hr>
                    {!! Form::submit('Veikt rezervāciju', array('class' => 'btn btn-outline-success ')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection