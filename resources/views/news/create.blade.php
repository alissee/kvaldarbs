@extends('main')


@section('titleofpage')
    Pievienot jaunu ziņu
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <hr>
            
                <h4>Pievienot jaunu rakstu</h4>
                <hr>

                {!! Form::open(['route' => 'jaunumi.store']) !!}
                    {!! Form::label('title', 'Virsraksts:') !!}
                    {!! Form::text('title', null, array('class' => 'form-control')) !!}

                    {!! Form::label('body', 'Raksts:') !!}
                    {!! Form::textarea('body', null, array('class' => 'form-control')) !!}
                <hr>
                    {!! Form::submit('Pievienot', array('class' => 'btn btn-outline-success ')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection