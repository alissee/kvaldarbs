@extends('main')


@section('titleofpage')
    Rediģēt rakstu
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row edit-post">
        <div class="col-md-12">
        <h3>Rediģēt rakstu "{{$device->device_name}}"</h3>
        <hr>
        <!-- no Laravel Collective -->

        {!! Form::model($device, ['route' => ['ierices.update', $device->id], 'method' => 'PUT']) !!}
                    {!! Form::label('device_name', 'Ierīces nosaukums:') !!}
                    {!! Form::text('device_name', null, array('class' => 'form-control', 'required')) !!}

                    {!! Form::label('description', 'Apraksts:') !!}
                    {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
        <hr>
        


        @if (Route::has('login'))
            @auth
            <div class="post-btns">
            {{ Form::submit('Saglabāt', ['class' =>'btn btn-outline-success edit-btnn']) }}
            {!! Html::linkRoute('jaunumi.show', 'Atcelt', array($device->id), array('class' =>'btn btn-outline-danger edit-btnn')) !!}
            {{-- {!! Html::linkRoute('jaunumi.update', 'Saglabāt', array($post->id), array('class' =>'btn btn-outline-success btn-block edit-btnn')) !!}         --}}
       
            </div>
            @endauth
        @endif
            {!! Form::close() !!}
                    </div>

    </div>
@endsection