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

            <h2> Rediģēt pasākuma informāciju</h2>

            <hr>

                {!! Form::model($event, ['route' => ['pasakumi.update', $event->id], 'method' => 'PUT']) !!}

                    {!! Form::label('name', 'Pasākuma nosaukums:') !!}
                    {!! Form::text('name', $event->name, array('class' => 'form-control', 'required')) !!}
                    <br>
                    {{ Form::label('start', 'Sākuma laiks:') }}
                    {{ Form::datetime('start', $event->start->dateTime, array('class' => 'form-control', 'required')) }}
                    <small class="form-text text-muted">Svarīgi! Laiks ir jānorāda formātā formātā YYYY-MM-DD HH:MM:SS</small>

                    <br>
              
                    {{ Form::label('end', 'Beigu laiks:') }}
                    {{ Form::datetime('end', $event->end->dateTime, array('class' => 'form-control', 'required')) }}
                    <small class="form-text text-muted">Svarīgi! Laiks ir jānorāda formātā formātā YYYY-MM-DD HH:MM:SS</small>
                    <br>                    

                    {!! Form::label('location', 'Pasākuma norises vieta:') !!}
                    {!! Form::text('location', $event->location, array('class' => 'form-control')) !!}

                    {!! Form::label('description', 'Apraksts:') !!}
                    {!! Form::textarea('description', $event->description, array('class' => 'form-control')) !!}
                

                <hr>
                    {!! Form::submit('Pievienot', array('class' => 'btn btn-outline-success ')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection