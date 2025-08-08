@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> {{-- Largeur réduite --}}
            
            <h1 class="mb-4 text-center fw-bold">Modifier l'équipe</h1>

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
                <form action="{{ route('teams.update', $team->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nom --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom de l'équipe</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nom de l'équipe" value="{{ $team->name }}">
                    </div>

                    {{-- Année de création --}}
                    <div class="mb-3">
                        <label for="year_creation" class="form-label">Année de création</label>
                        <input type="text" name="year_creation" id="year_creation" class="form-control" placeholder="Ex: 2020" value="{{ $team->year_creation }}">
                    </div>

                    {{-- Photo --}}
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                        @if ($team->photo)
                            <small class="d-block mt-2 text-muted">Photo actuelle :</small>
                            <img src="{{ asset('storage/' . $team->photo) }}" alt="Photo de l'équipe" class="img-thumbnail mt-1" style="width: 150px;">
                        @endif
                    </div>

                    {{-- Bouton --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
