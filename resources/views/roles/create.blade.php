@extends('main')


@section('titleofpage')
    Pievienot jaunu lietotāju lomu
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <hr>
            
                <h4>Pievienot jaunu lietotāju lomu</h4>
                <hr>

                {!! Form::open(['route' => 'lomas.store']) !!}
                    {!! Form::label('name', 'Loma:') !!}
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}

                <hr>
                    {!! Form::submit('Pievienot', array('class' => 'btn btn-outline-success ')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection