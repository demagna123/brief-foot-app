@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4 text-center fw-bold">Créer un nouveau match</h2>

            {{-- Affichage des erreurs --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulaire --}}
            <div class="card shadow-sm p-4">
                <form method="POST" action="{{ route('matches.store') }}">
                    @csrf

                    {{-- Équipe à domicile --}}
                    <div class="mb-3">
                        <label for="home_team_id" class="form-label">Équipe à domicile</label>
                        <select name="home_team_id" id="home_team_id" class="form-select" required>
                            <option value="">-- Sélectionner --</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Équipe adverse --}}
                    <div class="mb-3">
                        <label for="away_team_id" class="form-label">Équipe adverse</label>
                        <select name="away_team_id" id="away_team_id" class="form-select" required>
                            <option value="">-- Sélectionner --</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Date du match --}}
                    <div class="mb-3">
                        <label for="date_matche" class="form-label">Date du match</label>
                        <input type="datetime-local" name="date_matche" id="date_matche" class="form-control" required>
                    </div>

                    {{-- Statut du match --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Statut du match</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="à venir">À venir</option>
                            <option value="en cours">En cours</option>
                            <option value="terminé">Terminé</option>
                            <option value="reporté">Reporté</option>
                        </select>
                    </div>

                    {{-- Bouton --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Créer le match
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
