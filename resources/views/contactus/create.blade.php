@extends('main')


@section('titleofpage')
    Pievienot jaunu ziņu
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row contact-us-section">
        <div class="col-md-12">

            <div class="col-md-10 offset-md-1">
                    @if (Route::has('login'))
            @auth
            <a class="btn btn-outline-secondary styled-btn" href="{{ route('sazinies.index') }}">Apskatīt visas saņemtās ziņas</a>
            @endauth
        @endif
            <h2> Sazinies ar mums! </h2>
            <p> Ieteikumi? Jautājumi? Droši raksti šeit! :) </p>
            <hr>


                {!! Form::open(['route' => 'sazinies.store']) !!}

                    {!! Form::label('name', 'Vārds:') !!}
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}

                    {!! Form::label('email', 'Epasts:') !!}
                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                <small id="emailHelp" class="form-text text-muted">E-pasts ir nepieciešams tikai tad, ja vēlaties, lai mēs ar Jums sazinamies</small>

                    {!! Form::label('theme', 'Tēma*:') !!}
                    {!! Form::text('theme', null, array('class' => 'form-control', 'id' => 'contactUsSubject', 'required')) !!}

                    {!! Form::label('message', 'Ziņojums*:') !!}
                    {!! Form::textarea('message', null, array('class' => 'form-control', 'id' => 'contactUsMessage', 'required')) !!}
                    



                <hr>
                    {!! Form::submit('Pievienot', array('class' => 'btn btn-outline-success ')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection