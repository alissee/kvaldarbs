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
            <h1>Visi lietotāji</h1>

            <a href="/lomas/create">Pievienot lomu</a>


        <table class="table issue-msg-table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Vārds</th>
            <th scope="col">E-pasts</th>
            <th scope="col">Reģistrēšanās datums</th>
            <th scope="col">Loma</th>
            <th scope="col">Mainīt lomu</th>
            </tr>
        </thead>
        <tbody>

@foreach($roles as $role)
<li> {{'Lietotāja loma ar id ' . $role->id .' ir '.  $role->name}} </li>
@endforeach




        @foreach ($users as $user)
        @foreach ($user->roles as $role) 
{{ $role }}
@endforeach
            <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('d.m.Y') }}</td>
            {{-- <td>{{ ($user->roles[$role->users['user_id']]['name'])}}</td> --}}
            {{-- <td>{{ dd($user[$user->id]->roles())}}</td> --}}
            @if(isset($roleusers))
            <td>{{ $roleusers->where('user_id', $user->id)->first() }}</td>
            @endif
                <td>{{ $user->roles->first() }}</td>
            <td><a href="lomas/{{$user->id}}/edit?id={{$user->id}}">Mainīt</a><td>

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