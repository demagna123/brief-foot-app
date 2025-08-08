@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row g-4 align-items-center mb-4">
    {{-- PHOTO --}}
    <div class="col-12 col-md-auto text-center">
      @if ($player->photo)
        <img src="{{ asset('storage/'.$player->photo) }}" alt="{{ $player->name }}"
             class="rounded shadow-sm" style="width:240px;height:240px;object-fit:cover;">
      @else
        <img src="{{ asset('images/default-avatar.png') }}" alt="Photo par défaut"
             class="rounded shadow-sm" style="width:240px;height:240px;object-fit:cover;">
      @endif
    </div>

    {{-- INFOS --}}
    <div class="col">
      <h1 class="fw-bold mb-3" style="font-size: 2rem;">{{ $player->name }}</h1>
      <dl class="row mb-0 align-items-center">
        <dt class="col-sm-3 fw-semibold mb-1">Âge</dt>
        <dd class="col-sm-9 mb-1">{{ $player->age ?? '—' }}</dd>

        <dt class="col-sm-3 fw-semibold mb-1">Vitesse</dt>
        <dd class="col-sm-9 mb-1">{{ $player->speed ? $player->speed.' km/h' : '—' }}</dd>

        <dt class="col-sm-3 fw-semibold mb-1">Équipe</dt>
        <dd class="col-sm-9 mb-1">{{ $player->team?->name ?? 'Aucune équipe' }}</dd>
      </dl>

      {{-- ACTIONS SI CONNECTÉ --}}
      @auth
      <div class="d-flex gap-2 mt-3">
        <a href="{{ route('players.edit', $player) }}" class="btn btn-outline-secondary">Modifier</a>
        <form action="{{ route('players.destroy', $player) }}" method="POST"
              onsubmit="return confirm('Supprimer ce joueur ?');">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Supprimer</button>
        </form>
      </div>
      @endauth
    </div>
  </div>

  <a href="{{ route('players.index') }}" class="text-decoration-none">← Retour à la liste</a>
</div>
@endsection
