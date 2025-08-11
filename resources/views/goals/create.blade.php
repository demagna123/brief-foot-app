@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="mb-4 fw-bold text-center">Ajouter un but</h2>

            {{-- Affichage des erreurs --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulaire --}}
            <div class="card shadow-sm p-4">
                <form action="{{ route('goals.store') }}" method="POST">
                    @csrf

                    {{-- Équipe dans le match --}}
                    <div class="mb-3">
                        <label for="matche_team_id" class="form-label fw-bold">Équipe dans le match</label>
                        <select name="matche_team_id" id="matche_team_id" class="form-select" required>
                            <option value="">-- Sélectionnez une équipe --</option>
                            @foreach ($matcheTeams as $matcheTeam)
                                @if ($matcheTeam->matche && $matcheTeam->team)
                                    <option value="{{ $matcheTeam->id }}">
                                        Match #{{ $matcheTeam->matche->id }} - {{ $matcheTeam->team->name }} ({{ ucfirst($matcheTeam->position) }})
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Joueur --}}
                    <div class="mb-3">
                        <label for="player_id" class="form-label fw-bold">Joueur</label>
                        <select name="player_id" id="player_id" class="form-select" required>
                            <option value="">-- Sélectionnez un joueur --</option>
                            @foreach ($players as $player)
                                <option value="{{ $player->id }}">{{ $player->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Minutes --}}
                    <div class="mb-3">
                        <label for="minutes" class="form-label fw-bold">Minutes</label>
                        <input type="number" name="minutes" id="minutes" class="form-control" placeholder="Ex : 45" min="0" required>
                    </div>

                    {{-- Secondes --}}
                    <div class="mb-4">
                        <label for="secondes" class="form-label fw-bold">Secondes</label>
                        <input type="number" name="secondes" id="secondes" class="form-control" placeholder="Ex : 30" min="0" max="59" required>
                    </div>

                    {{-- Bouton --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Enregistrer
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
