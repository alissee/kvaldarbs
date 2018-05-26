@extends('main')


@section('titleofpage')
    Pievienot jaunu Ierīci
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row contact-us-section">
        <div class="col-md-12">

            <div class="col-md-10 offset-md-1">

            <h2> Pievienot jaunu Ierīci</h2>

            <hr>


                {!! Form::open(['route' => 'ierices.store', 'enctype' => 'multipart/form-data']) !!}

                    {!! Form::label('device_name', 'Ierīces nosaukums:') !!}
                    {!! Form::text('device_name', null, array('class' => 'form-control', 'required')) !!}

                    {!! Form::label('description', 'Apraksts:') !!}
                    {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
                    <br>

                    {!! Form::label('image', 'Ierīces attēls:') !!}
                    {{ Form::file('image') }}
                

                <hr>
                    {!! Form::submit('Pievienot', array('class' => 'btn btn-outline-success ')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection