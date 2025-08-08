@extends('layouts.app')

@section('content')
<h1>Détails du but</h1>

<p>Match : {{ $goal->matcheTeam->matche->id ?? 'N/A' }}</p>
<p>Équipe : {{ $goal->matcheTeam->team->name ?? 'N/A' }}</p>
<p>Joueur : {{ $goal->player->name ?? 'N/A' }}</p>
<p>Temps : {{ $goal->secondes }} secondes</p>

    <a href="{{ route('goals.index') }}">← Retour à la liste</a>
@endsection
