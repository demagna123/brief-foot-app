@extends('layouts.app')

@section('content')
<style>
  .sticky-actions { position: sticky; top: 64px; z-index: 1020; }
  .player-card img { height: 140px; object-fit: cover; border-radius: .75rem; }
</style>

<div class="container">

  {{-- Titre + bouton créer (sticky) --}}
  <div class="d-flex justify-content-between align-items-center sticky-actions mb-4">
    <h1 class="fw-bold m-0">Liste des joueurs</h1>
    @auth
      <a href="{{ route('players.create') }}" class="btn btn-success">+ Ajouter un joueur</a>
    @endauth
  </div>

  @if ($players->isEmpty())
    <p class="text-muted">Aucun joueur enregistré.</p>
  @else
    <div class="row g-4">
      @foreach ($players as $player)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card player-card h-100 shadow-sm text-center p-2">

            {{-- Photo --}}
            @if ($player->photo)
              <img src="{{ asset('storage/' . $player->photo) }}" alt="{{ $player->name }}" class="card-img-top p-2">
            @else
              <img src="{{ asset('images/default-avatar.png') }}" alt="Photo par défaut" class="card-img-top p-2">
            @endif

            {{-- Infos --}}
            <div class="card-body pt-2">
              <h5 class="card-title fw-bold mb-1">{{ $player->name }}</h5>
              <div class="text-muted small mb-3">
                {{ $player->team->name ?? 'Équipe : Non assigné' }}
              </div>

              {{-- Bouton Détails --}}
              <a href="{{ route('players.show', $player->id) }}" class="btn btn-outline-primary btn-sm w-100">
                Voir détails
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif

</div>
@endsection
