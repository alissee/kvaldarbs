@extends('main')


@section('titleofpage')
        Saņemtās rezervācijas
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div class="row issue-msg-section">
        <div class="col-md-12">
            <h1>Saņemtās rezervācijas</h1>


        <table class="table issue-msg-table">
        <thead>
            <tr>
            <th scope="col">Rezervācijas ID</th>
            <th scope="col">Lietotājs</th>
            <th scope="col">Ierīce</th>
            <th scope="col">Datums</th>
            <th scope="col">Laiks</th>
            <th scope="col">Rezervācijas veikšanas datums</th>
            <th scope="col">Atbilde</th>
            <th scope="col">Atbildēt</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($deviceReservations as $reservation)
            <tr>
            <th scope="row">{{$reservation->id}}</th>
            <td>{{ $users[($reservation->user_id)-1]->name }}</td>
            <td>{{ $devices[($reservation->device_id)-1]->device_name }}</td>
            <td>{{ $reservation->date }}</td>
            <td>{{ $reservation->time }}</td>
            <td>{{ $reservation->created_at->format('d.m.Y') }}</td>
            @if(!($reservation->answer))
            <td style="background-color:red">{{ $reservation->answer }}</td>
            @elseif(($reservation->answer)=='1')
            <td>Apstiprināts</td>
            @elseif(($reservation->answer)=='0')
            <td>Noraidīts</td>
            @else <td>{{$reservation->answer}}</td>
            @endif
            <td><a href="/iericesrezervacija/{{$reservation->id}}/edit">Skatīt</a></td>
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