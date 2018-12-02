@if(session()->has('user'))

    {{-- user navbar --}}
@include('partials._usernav', ['user' => $currentUser])

@else

     {{-- landing navbar --}}
@include('partials._landingnav')

@endif
