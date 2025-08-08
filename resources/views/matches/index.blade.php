@extends('layouts.app')

@section('content')
    <h2>Liste des matchs</h2>

    @foreach ($matches as $match)
        <div style="margin-bottom: 20px;">
            <p>
                <strong>
                    <div>
                        @if ($match->homeTeam()?->photo)
                            <img src="{{ asset('storage/' . $match->homeTeam()->photo) }}" alt="Photo de profil"
                                style="width: 100px; height: 100px; ">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Photo de profil par défaut"
                                style="">
                        @endif
                    </div>
                    {{ $match->homeTeam()?->name ?? 'Équipe inconnue' }}
                    {{ $match->homeScore() }}
                    -

                    {{ $match->awayScore() }}
                    {{ $match->awayTeam()?->name ?? 'Équipe inconnue' }}

                    <div>
                        @if ($match->awayTeam()?->photo)
                            <img src="{{ asset('storage/' . $match->awayTeam()->photo) }}" alt="Photo de profil"
                                style="width: 100px; height: 100px; ">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Photo de profil par défaut"
                                style="">
                        @endif
                    </div>
                </strong><br>
                <small>{{ $match->date_matche }} | Statut : {{ $match->status }}</small><br>

                <!-- 👇 Lien vers les détails -->
                <a href="{{ route('matches.show', $match->id) }}">Voir les détails du match</a>
                <a href="{{ route('matches.edit', $match->id) }}">Modifier</a>
                <form action="{{ route('matches.destroy', $match->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
                </form>
            </p>
        </div>
    @endforeach
@endsection
