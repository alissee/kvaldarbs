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
        <h3>Piešķirt lietotājam lomu</h3>
        <hr>
        <!-- no Laravel Collective -->
        {!! Form::open(['route' => ['lomas.update', $user->id], 'method' => 'PUT']) !!}

        {!! Form::label('answer', 'Atbilde:') !!}
        <p>Administrators {{ Form::radio('answer', '1') }} </p>
        <p>Parasts lietotājs {{ Form::radio('answer', '2') }}</p>
        <p>Pasniedzējs {{ Form::radio('answer', '3') }} </p>
        <p>Students {{ Form::radio('answer', '4') }}</p>

        <div style= 'display:none'>
            {!! Form::label('user_id_of', 'Ierīces nosaukums:') !!}
            {!! Form::text('user_id_of', "$_GET[id]", array('class' => 'form-control', 'required')) !!}

        </div>
        {{-- {!! Form::model($post, ['route' => ['jaunumi.update', $post->id], 'method' => 'PUT']) !!}
        {!! Form::label('title', 'Virsraksts:') !!}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
        {!! Form::label('body', 'Raksts:') !!}
        {{ Form::textarea('body', null, ['class' => 'form-control']) }} --}}
        <hr>
        


        @if (Route::has('login'))
            @auth
            <div class="post-btns">
            {{ Form::submit('Saglabāt', ['class' =>'btn btn-outline-success edit-btnn']) }}
            {{-- {!! Html::linkRoute('lomas.index', 'Atcelt', array($post->id), array('class' =>'btn btn-outline-danger edit-btnn')) !!} --}}
            {{-- {!! Html::linkRoute('jaunumi.update', 'Saglabāt', array($post->id), array('class' =>'btn btn-outline-success btn-block edit-btnn')) !!}         --}}
       
            </div>
            @endauth
        @endif
            {!! Form::close() !!}
                    </div>

    </div>
@endsection