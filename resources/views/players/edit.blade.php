@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4 text-center fw-bold">Modifier un joueur</h2>

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
                <form action="{{ route('players.update', $player->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nom --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $player->name }}" placeholder="Nom du joueur" required>
                    </div>

                    {{-- Âge --}}
                    <div class="mb-3">
                        <label for="age" class="form-label">Âge</label>
                        <input type="number" name="age" id="age" class="form-control" value="{{ $player->age }}" placeholder="Âge du joueur" required>
                    </div>

                    {{-- Taille --}}
                    <div class="mb-3">
                        <label for="size" class="form-label">Taille</label>
                        <input type="text" name="size" id="size" class="form-control" value="{{ $player->size }}" placeholder="Taille du joueur" required>
                    </div>

                    {{-- Vitesse --}}
                    <div class="mb-3">
                        <label for="speed" class="form-label">Vitesse</label>
                        <input type="text" name="speed" id="speed" class="form-control" value="{{ $player->speed }}" placeholder="Vitesse du joueur" required>
                    </div>

                    {{-- Pays --}}
                    <div class="mb-3">
                        <label for="country" class="form-label">Pays</label>
                        <input type="text" name="country" id="country" class="form-control" value="{{ $player->country }}" placeholder="Pays du joueur" required>
                    </div>

                    {{-- Équipe --}}
                    <div class="mb-3">
                        <label for="team_id" class="form-label">Équipe</label>
                        <select name="team_id" id="team_id" class="form-select" required>
                            <option value="">-- Sélectionner une équipe --</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}" {{ $player->team_id == $team->id ? 'selected' : '' }}>
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Photo --}}
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                        @if ($player->photo)
                            <small class="text-muted d-block mt-1">Photo actuelle :</small>
                            <img src="{{ asset('storage/' . $player->photo) }}" alt="Photo actuelle" class="img-thumbnail mt-2" style="max-width: 150px;">
                        @endif
                    </div>

                    {{-- Bouton --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Mettre à jour</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
