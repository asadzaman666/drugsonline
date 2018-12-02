<!DOCTYPE html>
<html lang="en">

<head>

    @include('partials._header')

    @yield('custom-css')

</head>


  <body>


        <!-- Navigation -->

            @include('partials._navbar')


        <!-- Page Content -->
            @yield('content')


        <!-- Footer -->
            <!-- @include('partials._footer') -->


        <!-- Bootstrap core JavaScript -->
            @include('partials._javascripts')
            @yield('custom-scripts')


  </body>

</html>
