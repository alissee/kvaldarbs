@if (Session::has('success'))

    <div class="alert alert-success" role="alert" style="margin-top:10px">
        {{ Session::get('success')}}
    </div>

@endif

@if (Session::has('warning'))

    <div class="alert alert-warning" role="alert" style="margin-top:10px">
        {{ Session::get('warning')}}
    </div>

@endif


@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert" style="margin-top:10px">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>

@endif