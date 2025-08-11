<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'FootApp' }}</title>

    {{-- Bootstrap CSS --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.7/dist/css/bootstrap.min.css') }}">
</head>
<body class="bg-white text-dark">

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm rounded-nav">
  <div class="container">
    {{-- Logo + marque --}}
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
      <img src="{{ URL::asset('/images/default-logo.png') }}" alt="logo" height="28">
      {{-- <span class="fw-bold">default</span><small class="text-muted">design</small> --}}
    </a>

    {{-- Toggler mobile --}}
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Liens à droite --}}
    <div id="mainNav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('matches.index') ? 'active' : '' }}" 
             href="{{ route('matches.index') }}">
            Liste des matchs
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('matches.index') ? 'active' : '' }}" 
             href="{{ route('teams.index') }}">
            Liste des equipes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('matches.index') ? 'active' : '' }}" 
             href="{{ route('players.index') }}">
            Liste des joueurs
          </a>
        </li>
       @auth
            <li class="nav-item">
          <a class="btn btn-primary px-3" href="{{ route('logout') }}">
            Se deconnecter
          </a>
        </li>
        @else
          <li class="nav-item">
          <a class="btn btn-primary px-3" href="{{ route('login') }}">
            Se connecter
          </a>
        </li>
       @endauth
      </ul>
    </div>
  </div>
</nav>

    <main class="container py-4">
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('bootstrap-5.3.7/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
