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
            <h1>Visi Pasākumi</h1>
            <hr>
            @if (Route::has('login'))
                @auth
                    <a href='/pasakumi/create' class="btn btn-outline-dark">Pievienot jaunu pasākumu</a>
                    <a href='/telpasrezervacija/create' class="btn btn-outline-dark">Pieteikties uz telpas rezervāciju</a>
                    <a href='/telpasrezervacija' class="btn btn-outline-dark">Apskatīt telpas rezervācijas </a>
                    <hr>
                @endauth
            @endif

        @foreach ($events as $event)
            
            <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h6 href="/jaunumi/{{$event->id}}" class="display-4">{{ $event->summary }}</h6>
                <p class="lead">{{ $event->location }}</p>
                                <p class="lead">{{ $event->description}} </p>
                <p class="news-date">{{ $event->start['dateTime']}}</p>

                {{-- <a href="{{$event->htmlLink}}">Apskatīt pasākumu</a>  --}}
                <a href="{{$event->htmlLink}}" class="btn btn-outline-secondary" target="_blank">Apskatīt pasākumu</a>
            @if (Route::has('login'))
                @auth
                <a href="/pasakumi/{{ $event->id }}/edit " class="btn btn-outline-secondary btn-sm" target="_blank">Rediģēt pasākumu</a>
                {{-- <a href="{{$event->htmlLink}}" class="btn btn-outline-secondary btn-sm" target="_blank">Dzēst pasākumu</a> --}}

            {!! Form::open(['route' => ['pasakumi.destroy', $event->id], 'method' => 'delete']) !!}
            {{-- {!!Html::linkRoute('jaunumi.destroy', 'Dzēst', array($post->id), array('class' =>'btn btn-outline-danger edit-btnn', 'value' => 'DELETE', 'onclick' => "return confirm('Raksts tiks neatgriezeniski izdzēsts')"))!!} --}}
            {!! Form::submit('Izdzēst pasākumu', ['class' => 'btn btn-outline-danger btn-sm', 'style' => 'margin-top:5px']) !!}
            {!! Form::close() !!}    
                @endauth
            @endif

                {{-- <a href="/jaunumi/{{$event->id}}" class="btn btn-outline-secondary">Lasīt rakstu</a> --}}

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