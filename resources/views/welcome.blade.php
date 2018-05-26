@extends('main')

@section('titleofpage')
    Sākumlapa
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
    
@endsection
  <script  href="main.js" type="text/javascript" /></script>
@section('content')

    <div class="row front-page">
    <div class="col-md-12">
        <hr>
        <div class="front-up">
            <div class="bg"></div>
        <div class="jumbotron">
            <h1 class="display-4">“DF LAB”–iespēja pielietot jaunās tehnoloģijas savu ideju realizācijā!</h1>
            <p class="lead">Raiņa bulvāris 19, Room 303, Riga, Latvia</p>
            <hr class="my-4">
            <!-- <p>Nananananananaaa.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
        </div> <!-- end of jumbotron -->
        </div>
        </div><!-- end of col-md-12 -->
    </div><!-- end of row -->

    <div class="row">
        <div class="col-md-9">

        @foreach ($posts as $post)
            
            <div class="frontpage-news">

                <h3>{{ $post->title }}</h3>
                 <p> {{ $post->body }} </p>
                <a href="/jaunumi/{{ $post->id }}" class="btn btn-light read-more-btn">Atvērt rakstu</a>

            </div>
            <hr>
        @endforeach


        </div><!-- end of col-md-9 -->

        <div class="col-md-2 col-md-offset-1">
        <h2>Te būs kalendārs:)))</h2>

        



        </div><!-- end of col-md-2 -->
    </div><!-- end of row -->

@endsection
