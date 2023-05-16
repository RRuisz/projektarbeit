<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
      .dropdown-item:hover { background-color: #414040 !important; }
      </style>
</head>
<body class="bg-secondary">
    <div class="container-fluid p-0 d-flex  bg-dark justify-content-between">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container-fluid bg-dark">
              <a class="navbar-brand  text-white fs-4 ps-4 pe-4" href="{{ route('home')}}">Hotel Timeghost</a>
              <button class="navbar-toggler bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <li class="nav-item dropdown pe-5">
                    <a class="nav-link dropdown-toggle text-info" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      News
                    </a>
                    <ul class="dropdown-menu bg-dark">
                      <li><a class="dropdown-item text-info" href="{{route('news')}}">Übersicht</a></li>
                      @if (Auth::user()->role_id < 3)
                      <li><a href="{{ route('news.new') }} " class="dropdown-item text-info">Erstellen</a></li>
                      @endif
                    </ul>
                  </li>
                  <li class="nav-item dropdown pe-5">
                    <a class="nav-link dropdown-toggle text-info" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Übergaben
                    </a>
                    <ul class="dropdown-menu bg-dark">
                      <li><a class="dropdown-item text-info" href="{{route('handover')}}">Übersicht</a></li>
                      <li><a class="dropdown-item text-info" href="{{route('handover.new')}}">Erstellen</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown pe-5">
                    <a class="nav-link dropdown-toggle text-info" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Technik
                    </a>
                    <ul class="dropdown-menu bg-dark">
                      <li><a class="dropdown-item text-info" href="{{route('engineering')}}">Übersicht</a></li>
                      <li><a class="dropdown-item text-info" href="{{route('engineering.new')}}">Erstellen</a></li>
                    </ul>
                  </li>
                  <a class="nav-link text-info pe-5" href="{{route('infos')}}">Rezepte</a>                  
                  <a class="nav-link text-info pe-5" href="{{route('user.all')}}">Mitarbeiter</a>                  
                  
                </div>
              </div>
            </div>
        </nav>
        <li class="nav-item dropdown pe-5 pb-4">
          <a class="nav-link dropdown-toggle text-info" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Userpanel
          </a>
          <ul class="dropdown-menu bg-dark">
            <li class="text-info text-center"> Eingeloggt:</li>
            <li class="text-warning text-center mb-1"> {{ Auth::user()->name }} </li>
            <li><a class="dropdown-item text-info" href="{{ route('user.panel', Auth::user()->id) }}">Übersicht</a></li>
            <li><a class="dropdown-item text-info" href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </li>
      </div>
    </div>
    @yield('content')
    @yield('scripts')
</body>
</html>
