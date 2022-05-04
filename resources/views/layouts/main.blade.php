<!DOCTYPE html>

                                    
<html lang = "nl">
    <head>
        <title>Sensor Monitoring Tool</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>.containerTable{
    display: flex;
    justify-content: center;
    align-items: center;
}
        
        .labelTest{
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    display: block;
    text-align: center;
    margin: 30px;
    background-color: red;
    color: white;
    font-size: 30px;
    padding: 15px;
}</style>
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
        <main style="width: 100%">
            @yield('content')
        </main>
    </body>
</html>

