@extends('main')


@section('titleofpage')
    Visas ierīces
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row news-section">
        <div class="col-md-12">
            <h1>Visas ierīces</h1>
            <hr>
            @if (Route::has('login'))
                @auth
                    <a href='/ierices/create' class="btn btn-outline-dark">Pievienot jaunu ierīci</a>
                    <a href='/iericesrezervacija' class="btn btn-outline-dark">Apskatīt veiktās rezervācijas</a>

                    <hr>
                @endauth
            @endif
        <div>
        
        @foreach ($devices as $device)
            
        <div class="card device-card">
        <div class="card-body">
            <h5 class="card-title device-card-heading"><a  href="/ierices/{{$device->id}}">{{ $device->device_name}}</a></h5>
            @if (strlen($device->description)>150) 
            <p class="card-text">{{ substr($device->description, 0, 150) }}... <a  href="/ierices/{{$device->id}}">lasīt vairāk</a></p>

            @else
            <p class="card-text">{{ $device->description }}</p>
            @endif
            <a  href="/ierices/{{$device->id}}">
            <img src="{{ $device->image_path }}"></a>
            <a href='iericesrezervacija/create?id={{$device->id}}' class="btn btn-outline-dark">Pieteikties uz izmantošanu</a>
        </div>
        </div>
        @endforeach
        </div>
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