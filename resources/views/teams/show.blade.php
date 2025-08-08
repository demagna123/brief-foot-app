@extends('layouts.app')

@section('content')
    <h2>Détails de l'équipe</h2>

    <div>
        @if ($team->photo)
            <img src="{{ asset('storage/' . $team->photo) }}" alt="Photo de profil" style="width: 300px; height: 300px;">
        @else
            <img src="{{ asset('images/default-avatar.png') }}" alt="Photo de profil par défaut">
        @endif
    </div>
    <p><strong>Nom :</strong> {{ $team->name }}</p>
    <p><strong>Année de création :</strong> {{ $team->year_creation }}</p>
    <p><strong>Nombre de joueurs :</strong> {{ $team->players->count() }}</p>

    <h3>Liste des joueurs</h3>
    @if ($team->players->isEmpty())
        <p>Aucun joueur enregistré.</p>
    @else
        <ul>
            @foreach ($team->players as $player)
                <div>
                    @if ($player->photo)
                        <img src="{{ asset('storage/' . $player->photo) }}" alt="Photo de profil"
                            style="width: 100px; height: 100px; ">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="Photo de profil par défaut" style="">
                    @endif
                </div>
                <li>Nom:{{ $player->name }} - {{ $player->position ?? 'Position inconnue' }}</li>
                <li> Age:{{ $player->age }}</li>

                <div>
                    <a href="{{ route('players.show', $player->id) }}">voir detail</a>
                </div>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('teams.index') }}">← Retour à la liste des équipes</a>
@endsection
