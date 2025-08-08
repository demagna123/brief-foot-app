{{-- <form method="POST" action="{{ route('matches.update-score', $matche->id) }}">
    @csrf
    @method('PUT')

    <label>{{ $matche->homeTeam()->team->name }} (home)</label>
    <input type="number" name="home_score" value="{{ $matche->homeTeam()->score }}" min="0">

    <label>{{ $matche->awayTeam()->team->name }} (away)</label>
    <input type="number" name="away_score" value="{{ $matche->awayTeam()->score }}" min="0">

    <button type="submit">Mettre à jour les scores</button>
</form> --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer un nouveau match</h2>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('matches.update', $matche->id) }}">
        @csrf

        @method('PUT')
        <div>
            <label for="home_team_id">Équipe à domicile</label>
            <select name="home_team_id" >
                <option value="">-- Sélectionner --</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="away_team_id">Équipe adverse</label>
            <select name="away_team_id" >
                <option value="">-- Sélectionner --</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="date_matche">Date du match</label>
            <input type="datetime-local" name="date_matche" >
        </div>

        <div>
            <label for="status">Statut du match</label>
            <select name="status" >
                <option value="à venir">À venir</option>
                <option value="en cours">En cours</option>
                <option value="terminé">Terminé</option>
                <option value="reporté">Reporté</option>
            </select>
        </div>

        <div style="margin-top: 10px;">
            <button type="submit">Créer le match</button>
        </div>
    </form>
</div>
@endsection
