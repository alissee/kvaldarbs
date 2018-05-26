@extends('main')


@section('titleofpage')
    Atbildēt uz rezervāciju
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row edit-post">
        <div class="col-md-12">
        <h3>Atbildēt uz rezervāciju</h3>
        <hr>
        {{-- <!-- no Laravel Collective -->{{dd($deviceReservation->id)}} --}}
        {!! Form::open(['route' => ['iericesrezervacija.update', $deviceReservation->id], 'method' => 'PUT']) !!}
        {{-- {!! Form::model($deviceReservation, ['route' => ['iericesrezervacija.update', ($deviceReservation->id)], 'method' => 'PUT']) !!} --}}

        {!! Form::label('answer', 'Atbilde:') !!}
        <p>Jā {{ Form::radio('answer', '1') }} </p>

        <p>Nē {{ Form::radio('answer', '0') }}</p>
        

        <hr>
        


        @if (Route::has('login'))
            @auth
            <div class="post-btns">
            {{ Form::submit('Saglabāt atbildi', ['class' =>'btn btn-outline-success edit-btnn']) }}
            <a href="/iericesrezervacija" class="btn btn-outline-warning edit-btnn">Atpakaļ</a> 
            {{-- {!! Html::linkRoute('iericesrezervacija.index ', 'Atcelt', null, array('class' =>'btn btn-outline-danger edit-btnn')) !!} --}}
       
            </div>
            @endauth
        @endif
            {!! Form::close() !!}
                    </div>

    </div>
@endsection