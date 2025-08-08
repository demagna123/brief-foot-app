@extends('layouts.app')

@section('content')
    <h1>Détails du match #{{ $matche->id }}</h1>
    <p>Date : {{ $matche->date_matche }}</p>
    <p>Status : {{ $matche->status }}</p>

    <h2>Score</h2>
    <ul>
        @foreach ($matche->matcheTeams as $matcheTeam)
            <li>
                {{ $matcheTeam->team->name }} : {{ $matcheTeam->score }} buts
            </li>
        @endforeach
    </ul>

    <h2>Buts</h2>
    <ul>
        @foreach ($matche->matcheTeams as $matcheTeam)
            @foreach ($matcheTeam->goals as $goal)
                <li>
                    ⚽ {{ $goal->player->name }} ({{ $matcheTeam->team->name }}) — {{ $goal->minutes }}:{{ str_pad($goal->secondes, 2, '0', STR_PAD_LEFT) }}
                </li>
            @endforeach
        @endforeach
    </ul>

    <a href="{{ route('matches.index') }}">← Retour à la liste</a>
@endsection
