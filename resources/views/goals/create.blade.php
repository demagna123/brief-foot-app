@extends('layouts.app')

@section('content')
  <h2>Ajouter un but</h2>
     @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form action="{{ route('goals.store') }}" method="POST">
    @csrf

<label for="matche_team_id">Équipe dans le match</label>
<select name="matche_team_id" id="matche_team_id">
    @foreach ($matcheTeams as $matcheTeam)
        @if ($matcheTeam->matche && $matcheTeam->team)
            <option value="{{ $matcheTeam->id }}">
                Match: {{ $matcheTeam->matche->id }} - Équipe: {{ $matcheTeam->team->name }} ({{ $matcheTeam->position }})
            </option>
        @endif
    @endforeach
</select>

    <label for="player_id">Joueur</label>
    <select name="player_id" id="player_id">
        @foreach ($players as $player)
            <option value="{{ $player->id }}">{{ $player->name }}</option>
        @endforeach
    </select>

    <input type="number" name="minutes" placeholder="Minutes" required>
    <input type="number" name="secondes" placeholder="Secondes" required>

    <button type="submit">Enregistrer</button>
</form>


@endsection