@extends('layouts.app')

@section('content')
    
<h1>
    Create team
</h1>

   @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form action="{{ route('teams.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Nom equipe</label>
        <input type="text" name="name" id="name" placeholder="le nom de l'equipe">
    </div>

    <div>
        <label for="year_creation">Annee de creation</label>
        <input type="text" name="year_creation" id="year_creation" placeholder="la date de creation ">
</div>
    <div>
        <label for="photo">Photo</label>
        <input type="file" name="photo" id="photo">
    </div>
<div>
    <button type="submit">Envoyer</button>
</div>
</form>
@endsection