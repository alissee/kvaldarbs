@extends('main')


@section('titleofpage')
    Pievienot jaunu Pasākumu
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row contact-us-section">
        <div class="col-md-12">

            <div class="col-md-10 offset-md-1">

            <h2> Pievienot jaunu Pasākumu</h2>

            <hr>


                {!! Form::open(['route' => 'pasakumi.store']) !!}

                    {!! Form::label('name', 'Pasākuma nosaukums:') !!}
                    {!! Form::text('name', null, array('class' => 'form-control', 'required')) !!}
                    <br>
                    {{ Form::label('start', 'Sākuma laiks:') }}
                    {{ Form::datetime('start', null, array('class' => 'form-control', 'required')) }}
                    <small class="form-text text-muted">Svarīgi! Laiks ir jānorāda formātā formātā YYYY-MM-DD HH:MM:SS</small>

                    <br>
                    {{ Form::label('end', 'Beigu laiks:') }}
                    {{ Form::datetime('end', null, array('class' => 'form-control', 'required')) }}
                    <small class="form-text text-muted">Svarīgi! Laiks ir jānorāda formātā formātā YYYY-MM-DD HH:MM:SS</small>
                    <br>                    

                    {!! Form::label('location', 'Pasākuma norises vieta:') !!}
                    {!! Form::text('location', 'Raiņa bulvāris 19, LU DF LAB', array('class' => 'form-control')) !!}

                    {!! Form::label('description', 'Apraksts:') !!}
                    {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
                

                <hr>
                    {!! Form::submit('Pievienot', array('class' => 'btn btn-outline-success ')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection