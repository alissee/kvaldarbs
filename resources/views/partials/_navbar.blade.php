<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">DF LAB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">&#9776</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Sākumlapa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/jaunumi">Jaunumi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pasakumi">Pasākumi</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/ierices">Ierīces</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/sazinies/create">Sazinies ar mums</a>
        </li>


        @if (Route::has('login'))
            @auth              
             <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" aria-labelledby="navbarDropdown"
                       onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            {{ __('Iziet') }}
                    </a>
        </li>
        



            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" aria-labelledby="navbarDropdown"
                       onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>

                        <a class="dropdown-item" href="/">Profils</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                    </div>
                </li>

            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Pieslēgties</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('register') }}">Reģistrēties</a>
            </li>
            @endauth
        @endif
        </ul>
    </div> <!-- end of navbar-collapse -->
    </nav>