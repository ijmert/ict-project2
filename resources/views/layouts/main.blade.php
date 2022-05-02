<!DOCTYPE html>

                                    
<html lang = "nl">
    <head>
        <title>Sensor Monitoring Tool</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar-profiel" style="background-color: red;">
            <h1>Sensor Monitoring Tool</h1>
            <span href="{{ route('logout') }}" class="dot"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        {{ __('Logout') }} ></span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </nav>
        <main >
            @yield('content')
        </main>
    </body>
</html>

