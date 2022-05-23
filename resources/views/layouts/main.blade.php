<!DOCTYPE html>


<html lang = "nl">
    <head>
        <title>Sensor Monitoring Tool</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
       <nav class="navbar-profiel" style="background-color: red;">
            <h1>Sensor Monitoring Tool</h1>
            <span  class="dot">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: red;">
                        @yield('initials')
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li>
                        <a class="dropdown-item" href="{{route ('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" {{ __('Logout') }}>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </li>
                        <a class="dropdown-item" href="{{route ('showEditAccount') }}" onclick="event.preventDefault(); document.getElementById('showEditAccount-form').submit();" {{ __('Logout') }}>
                            Edit account
                        </a>
                        <form id="showEditAccount-form" action="{{ route('showEditAccount') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                          <!--   <a class="dropdown-item"> <form action="showEditAccount" method="POST" >

                                      <button type="submit" style="background-color: white; color: black;; border: none">edit account</button>
                          </form></a>-->
                        </li>

                    </ul>
                  </div>
            </span>
        </nav>
        <main style="width: 100%">
            @yield('content')
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

