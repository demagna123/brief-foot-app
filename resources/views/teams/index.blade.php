@extends('layouts.app')

@section('content')
    <h2>Liste des équipes</h2>

    @if ($teams->isEmpty())
        <p>Aucune équipe enregistrée pour le moment.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Année de création</th>
                    <th>Nombre de joueurs</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td>
                            <div>
                                @if ($team->photo)
                                    <img src="{{ asset('storage/' . $team->photo) }}" alt="Photo de profil" style="width: 100px; height: 100px;">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Photo de profil par défaut">
                                @endif
                            </div>
                        </td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->year_creation }}</td>
                        <td>{{ $team->players_count }}</td>
                        <td>
                            <a href="{{ route('teams.show', $team) }}">Voir détails</a>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('teams.create') }}">➕ Ajouter une nouvelle équipe</a>
@endsection
