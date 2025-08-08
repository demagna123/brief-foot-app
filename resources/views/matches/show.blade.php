@extends('layouts.app')

@section('content')
<style>
  .team-logo-lg { width: 140px; height: 140px; object-fit: contain; }
  .score-big { font-size: 3rem; font-weight: 800; line-height: 1; }
  .tile { border-radius: 14px; }
</style>

<div class="container">

  {{-- Titre + actions --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="fw-bold m-0">Match #{{ $matche->id }}</h1>
      <div class="text-muted">Date : {{ $matche->date_matche }} · Statut : {{ $matche->status }}</div>
    </div>

    @auth
      <div class="d-flex gap-2">
        <a href="{{ route('matches.edit', $matche->id) }}" class="btn btn-outline-secondary">Modifier</a>
        <form action="{{ route('matches.destroy', $matche->id) }}" method="POST" onsubmit="return confirm('Supprimer ce match ?');">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Supprimer</button>
        </form>
      </div>
    @endauth
  </div>

  {{-- HERO : gros logos + score --}}
  <div class="bg-white border shadow-sm tile p-4 mb-4">
    <div class="row align-items-center text-center g-3">
      {{-- Équipe 1 --}}
      <div class="col-12 col-md-4">
        @if (isset($matche->matcheTeams[0]))
          <img class="team-logo-lg mb-2"
               src="{{ $matche->matcheTeams[0]->team?->photo ? asset('storage/'.$matche->matcheTeams[0]->team->photo) : asset('images/default-avatar.png') }}"
               alt="{{ $matche->matcheTeams[0]->team?->name }}">
          <div class="fw-semibold fs-5">{{ $matche->matcheTeams[0]->team?->name }}</div>
        @endif
      </div>

      {{-- Score central --}}
      <div class="col-12 col-md-4">
        <div class="score-big">
          {{ isset($matche->matcheTeams[0]) ? $matche->matcheTeams[0]->score : 0 }}
          <span class="text-danger">-</span>
          {{ isset($matche->matcheTeams[1]) ? $matche->matcheTeams[1]->score : 0 }}
        </div>
      </div>

      {{-- Équipe 2 --}}
      <div class="col-12 col-md-4">
        @if (isset($matche->matcheTeams[1]))
          <img class="team-logo-lg mb-2"
               src="{{ $matche->matcheTeams[1]->team?->photo ? asset('storage/'.$matche->matcheTeams[1]->team->photo) : asset('images/default-avatar.png') }}"
               alt="{{ $matche->matcheTeams[1]->team?->name }}">
          <div class="fw-semibold fs-5">{{ $matche->matcheTeams[1]->team?->name }}</div>
        @endif
      </div>
    </div>
  </div>

  {{-- Liste des buts (ta structure) --}}
  <div class="bg-white border shadow-sm tile p-3 mb-4">
    <h2 class="h5 mb-3">Buts</h2>
    @php $hasGoals = false; @endphp
    <ul class="list-group list-group-flush">
      @foreach ($matche->matcheTeams as $matcheTeam)
        @foreach ($matcheTeam->goals as $goal)
          @php $hasGoals = true; @endphp
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              ⚽ <strong>{{ $goal->player?->name ?? 'Joueur' }}</strong>
              <span class="text-muted">({{ $matcheTeam->team?->name ?? 'Équipe' }})</span>
            </div>
            <span class="badge bg-primary rounded-pill">
              {{ $goal->minutes }}:{{ str_pad($goal->secondes, 2, '0', STR_PAD_LEFT) }}
            </span>
          </li>
        @endforeach
      @endforeach
    </ul>
    @if (!$hasGoals)
      <p class="text-muted mb-0">Aucun but pour le moment.</p>
    @endif
  </div>

  <a href="{{ route('matches.index') }}" class="text-decoration-none">← Retour à la liste</a>
</div>
@endsection
