<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
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
            <a class="nav-link" href="#">Pasākumi</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/ierices">Ierīces</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/sazinies">Sazinies ar mums</a>
        </li>
        

        @if (Route::has('login'))
            @auth
            <!-- <li class="nav-item">
                 <a class="nav-link" href="{{ url('/home') }}">Home</a>
            </li> -->
            
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endauth
        @endif


                <!-- Right Side Of Navbar -->
                <!-- Authentication Links -->
                @guest
                    <!-- <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> -->
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        </div>
                    </li>
                @endguest
        </ul>
    </div> <!-- end of navbar-collapse -->
    </nav>