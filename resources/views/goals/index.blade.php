@extends('layouts.app')

@section('content')
    <h2>Liste des buts</h2>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Match</th>
                <th>Équipe</th>
                <th>Joueur</th>
                <th>Minute</th>
                <th>Secondes</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($goals as $goal)
                <tr>
                    <td>{{ $goal->matche->homeTeam()?->name }} vs {{ $goal->matche->awayTeam()?->name }}</td>
                    <td>{{ $goal->team->name }}</td>
                    <td>{{ $goal->player->name }}</td>
                    <td>{{ $goal->minutes }}'</td>
                    <td>{{ $goal->secondes ?? '00' }}"</td>
                    <td>{{ $goal->type ?? 'Standard' }}</td>
                    <td>
                        <a href="{{ route('goals.show', $goal->id) }}">Voir</a>
                        <a href="{{ route('goals.edit', $goal->id) }}">Modifier</a>
                        <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer ce but ?')" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
