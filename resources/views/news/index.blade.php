@extends('main')


@section('titleofpage')
    Visi raksti
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row news-section">
        <div class="col-md-12">
            <h1>Visi Raksti</h1>
            <hr>
            @if (Route::has('login'))
                @auth
                    <a href='/jaunumi/create' class="btn btn-outline-dark">Pievienot jaunu rakstu</a>
                    <hr>
                @endauth
            @endif

        @foreach ($posts as $post)

            <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h6 href="/jaunumi/{{$post->id}}" class="display-4">{{ $post->title }}</h6>
            @if (strlen($post->body)>250) 
                <p class="lead">{{ substr($post->body, 0, 250) }}...</p>
             @else
                <p class="lead">{{ $post->body }}</p>
            @endif
                <p class="news-date">{{ $post->created_at->format('d.m.Y')}}</p>
                <a href="/jaunumi/{{$post->id}}" class="btn btn-outline-secondary">Lasīt rakstu</a>

            </div>
            </div>
        @endforeach
            {{-- <h1> {{ $post->title }} </h1>
            <hr>
            <p> {{ $post->body }} </p>
            <hr>
            <p style="float: right">{{ $post->created_at->format('Y-m-d')}}</p>
             --}}

        @if (Route::has('login'))
            @auth
            <div class="post-btns">

            {{-- {!!Html::linkRoute('jaunumi.edit', 'Rediģēt', array($post->id), array('class' =>'btn btn-outline-warning edit-btnn'))!!}
            {!!Html::linkRoute('jaunumi.destroy', 'Dzēst', array($post->id), array('class' =>'btn btn-outline-danger edit-btnn', 'value' => 'DELETE', 'onclick' => "return confirm('Raksts tiks neatgriezeniski izdzēsts')"))!!} --}}
                
            </div>
            @endauth
        @endif
            
    </div>


    </div>
@endsection