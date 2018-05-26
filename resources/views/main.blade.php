<!doctype html>
<html lang="en">

@include('partials/_head')

  <body>

    @include('partials/_navbar')

    <div class="container">

    @include('partials/_message')
    
        @yield('content')


    <hr>
    <p class="text-center"> 2018 </p>
    </div><!-- end of container -->

    @include('partials/_js')
    

  </body>
</html>