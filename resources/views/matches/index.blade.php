@extends('layouts.app')

@section('content')
<style>
  .sticky-actions { position: sticky; top: 64px; z-index: 1020; }
  .match-tile { border-radius: 14px; }
  .team-logo { width: 36px; height: 36px; object-fit: contain; }
</style>

<div class="container">

  {{-- Titre + bouton créer --}}
  <div class="d-flex justify-content-between align-items-center sticky-actions mb-4">
    <div>
      <h1 class="fw-bold mb-1">Parcourir tous les matchs prévus</h1>
      <div class="text-muted">Parcourez la liste de tous les matchs prévus du championnat.</div>
    </div>
    @auth
      <a href="{{ route('matches.create') }}" class="btn btn-primary">+ Créer un match</a>
    @endauth
  </div>

  @if ($matches->isEmpty())
    <p class="text-muted">Aucun match pour le moment.</p>
  @else
    <div class="row g-3">
      @foreach ($matches as $match)
        <div class="col-12 col-md-6 col-lg-4">
          <div class="bg-white border shadow-sm match-tile p-3">
            <div class="d-flex align-items-center justify-content-between">
              {{-- Équipe à domicile --}}
              <div class="d-flex align-items-center gap-2">
                @if ($match->homeTeam()?->photo)
                  <img class="team-logo" src="{{ asset('storage/' . $match->homeTeam()->photo) }}" alt="{{ $match->homeTeam()?->name }}">
                @else
                  <img class="team-logo" src="{{ asset('images/default-avatar.png') }}" alt="Photo par défaut">
                @endif
                <span class="fw-semibold">{{ $match->homeTeam()?->name ?? 'Équipe inconnue' }}</span>
              </div>

              {{-- Score --}}
              <div class="fw-bold">
                {{ $match->homeScore() }} <span class="text-danger">-</span> {{ $match->awayScore() }}
              </div>

              {{-- Équipe à l’extérieur --}}
              <div class="d-flex align-items-center gap-2">
                <span class="fw-semibold text-end">{{ $match->awayTeam()?->name ?? 'Équipe inconnue' }}</span>
                @if ($match->awayTeam()?->photo)
                  <img class="team-logo" src="{{ asset('storage/' . $match->awayTeam()->photo) }}" alt="{{ $match->awayTeam()?->name }}">
                @else
                  <img class="team-logo" src="{{ asset('images/default-avatar.png') }}" alt="Photo par défaut">
                @endif
              </div>
            </div>

            {{-- Date + statut + lien détails --}}
            <div class="d-flex justify-content-between align-items-center mt-2">
              <small class="text-muted">
                Date du match : {{ $match->date_matche }} | Statut : {{ $match->status }}
              </small>
              <a href="{{ route('matches.show', $match->id) }}" class="btn btn-sm btn-outline-primary">Détails</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif

</div>
@endsection
