@extends('layouts.app')

@section('content')
<style>
  /* Le bouton d’action reste visible quand on scrolle (sous la navbar) */
  .sticky-actions { position: sticky; top: 64px; z-index: 1020; }
</style>

<div class="container">

  {{-- HEADER ÉQUIPE + BOUTON AJOUTER (collé au titre) --}}
  <div class="row align-items-center g-4 mb-4">
    <div class="col-12 col-md-auto text-center">
      @if ($team->photo)
        <img src="{{ asset('storage/'.$team->photo) }}" alt="{{ $team->name }}"
             class="img-fluid"
             style="width:240px;height:240px;object-fit:contain;">
      @else
        <img src="{{ asset('images/default-avatar.png') }}" alt="Logo par défaut"
             class="img-fluid"
             style="width:240px;height:240px;object-fit:contain;">
      @endif
    </div>

    <div class="col">
      <div class="d-flex align-items-start justify-content-between gap-3 sticky-actions">
        <div>
          <h1 class="fw-bold mb-2">{{ $team->name }}</h1>
          <div class="text-muted">
            Année de création : <strong>{{ $team->year_creation ?? '—' }}</strong> ·
            Nombre de joueurs : <strong>{{ $team->players->count() }}</strong>
          </div>
        </div>

        @auth
          <div class="d-flex gap-2">
            <a href="{{ route('players.create', ['team_id' => $team->id]) }}" class="btn btn-success">
              + Ajouter un joueur
            </a>
          </div>
        @endauth
      </div>

      <p class="mt-3 mb-0" style="max-width: 70ch;">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error
        sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
      </p>

      @auth
        <div class="d-flex gap-2 mt-3">
          <a href="{{ route('teams.edit', $team) }}" class="btn btn-outline-primary btn-sm">Modifier l’équipe</a>
          {{-- Si tu veux garder la suppression d’équipe, laisse ce form. Sinon supprime-le. --}}
          <form action="{{ route('teams.destroy', $team) }}" method="POST"
                onsubmit="return confirm('Supprimer cette équipe ?');">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer l’équipe</button>
          </form>
        </div>
      @endauth
    </div>
  </div>

  {{-- LISTE DES JOUEURS EN GRID --}}
  <h2 class="h4 mb-3">Joueurs</h2>

  @if ($team->players->isEmpty())
    <p class="text-muted">Aucun joueur enregistré.</p>
  @else
    <div class="row g-4">
      @foreach ($team->players as $player)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <div class="card h-100 shadow-sm text-center">
            @if ($player->photo)
              <img src="{{ asset('storage/'.$player->photo) }}" alt="{{ $player->name }}"
                   class="card-img-top p-2" style="height:140px;object-fit:cover;border-radius:.75rem;">
            @else
              <img src="{{ asset('images/default-avatar.png') }}" alt="Photo par défaut"
                   class="card-img-top p-2" style="height:140px;object-fit:cover;border-radius:.75rem;">
            @endif

            <div class="card-body pt-2">
              <div class="fw-bold text-uppercase small mb-1">{{ $player->name }}</div>
              <div class="badge bg-light text-dark border small mb-2">
                {{ $player->age ? $player->age.' ans' : 'Âge N/A' }}
              </div>

              <a class="btn btn-primary btn-sm w-100 mb-2" href="{{ route('players.show', $player) }}">
                Détails du joueur
              </a>

            
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif

  <div class="mt-4">
    <a href="{{ route('teams.index') }}" class="text-decoration-none">← Retour aux équipes</a>
  </div>

</div>
@endsection
