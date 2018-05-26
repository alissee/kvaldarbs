@extends('main')


@section('titleofpage')
    Apskatīt rakstu
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row individual-post">
        <div class="col-md-12">
<div class="individual-post-body">
<div class="col-md-10 offset-md-1">



        <h2 id="post-headline"> {{ $post->title }} </h2>
        @if($post->image_path)
        <img src="../{{ $post->image_path }}" class="individual-post-img">
        @endif
        <hr>
        <p> {{ $post->body }} </p>
        <hr>
        <p>{{ $post->created_at->format('Y-m-d')}}</p>

        @if (Route::has('login'))
            @auth
            <div class="post-btns">

            {!!Html::linkRoute('jaunumi.edit', 'Rediģēt', array($post->id), array('class' =>'btn btn-outline-warning edit-btnn'))!!}

            {!! Form::open(['route' => ['jaunumi.destroy', $post->id], 'method' => 'delete']) !!}
            {{-- {!!Html::linkRoute('jaunumi.destroy', 'Dzēst', array($post->id), array('class' =>'btn btn-outline-danger edit-btnn', 'value' => 'DELETE', 'onclick' => "return confirm('Raksts tiks neatgriezeniski izdzēsts')"))!!} --}}
            {!! Form::submit('Izdzēst rakstu', ['class' => 'btn btn-outline-danger edit-btnn']) !!}
            {!! Form::close() !!}    
            </div>
            @endauth
        @endif
           
        </div>
        </div>

</div>

    </div>
@endsection