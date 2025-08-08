@extends('layouts.app')

@section('content')
    <h1>Détails du joueur</h1>

    <div>
        @if ($player->photo)
            <img src="{{ asset('storage/' . $player->photo) }}" alt="Photo de profil" style="width: 100px; height: 100px; ">
        @else
            <img src="{{ asset('images/default-avatar.png') }}" alt="Photo de profil par défaut" style="">
        @endif
    </div>

    <p><strong>Nom :</strong> {{ $player->name }}</p>
    <p><strong>Âge :</strong> {{ $player->age }}</p>
    <p><strong>Vitesse :</strong> {{ $player->speed }} km/h</p>
    <p><strong>Équipe :</strong> {{ $player->team?->name ?? 'Aucune équipe' }}</p>

    <a href="{{ route('players.index') }}">← Retour à la liste</a>
@endsection
