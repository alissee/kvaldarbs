@extends('main')


@section('titleofpage')
        Saņemtās ziņas
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row issue-msg-section">
        <div class="col-md-12">
            <h1>Saņemtās ziņas</h1>


        <table class="table issue-msg-table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Vārds</th>
            <th scope="col">E-pasts</th>
            <th scope="col">Tēma</th>
            <th scope="col">Datums</th>
            <th scope="col">Ziņa</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($issues as $issue)
            <tr>
            <th scope="row">{{$issue->id}}</th>
            <td>{{ $issue->name }}</td>
            <td>{{ $issue->email }}</td>
            <td>{{ $issue->theme }}</td>
            <td>{{ $issue->created_at->format('d.m.Y') }}</td>
            <td><a href="/sazinies/{{$issue->id}}">Skatīt</a></td>
            </tr>
        @endforeach
        </tbody>
        </table>

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