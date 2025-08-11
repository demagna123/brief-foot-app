@extends('layouts.app')

@section('content')
    <div class="text-center mb-5">
        <h1 class="fw-bold">Parcourir toutes les équipes</h1>
        <p class="text-muted">
            Parcourez la liste de toutes les équipes du championnat de<br>
            <strong>De Adn foot</strong>
        </p>
    </div>

    @if ($teams->isEmpty())
        <p class="text-center">Aucune équipe enregistrée pour le moment.</p>
    @else
        <div class="row g-4">
           
            @auth
                <div class="text-center mt-5">
                <a href="{{ route('teams.create') }}" class="btn btn-success">
                     Ajouter une nouvelle équipe
                </a>
            </div>
            @endauth
            
            @foreach ($teams as $team)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 text-center shadow-sm">
                        
                        @if ($team->photo)
                            <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->name }}"
                                class="card-img-top p-4" style="max-height: 150px; object-fit: contain;">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Photo par défaut"
                                class="card-img-top p-4" style="max-height: 150px; object-fit: contain;">
                        @endif

                        {{-- Infos --}}
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $team->name }}</h5>
                            <p class="mb-1">Année de création : {{ $team->year_creation }}</p>
                            <p class="text-muted small">Nombre de joueurs : {{ $team->players_count }}</p>
                            <a href="{{ route('teams.show', $team) }}" class="btn btn-primary btn-sm">
                                Détails de l’équipe
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif


@endsection
