@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> {{-- Largeur réduite --}}
            
            <h1 class="mb-4 text-center fw-bold">Créer une équipe</h1>

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
                <form action="{{ route('teams.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Nom --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom de l'équipe</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nom de l'équipe" value="{{ old('name') }}">
                    </div>

                    {{-- Année de création --}}
                    <div class="mb-3">
                        <label for="year_creation" class="form-label">Année de création</label>
                        <input type="text" name="year_creation" id="year_creation" class="form-control" placeholder="Ex: 2020" value="{{ old('year_creation') }}">
                    </div>

                    {{-- Photo --}}
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>

                    {{-- Bouton --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Envoyer
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
