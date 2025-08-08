@extends('layouts.app')

@section('content')
    
<h1>
    Create a player
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
<form action="{{ route('players.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" placeholder="le nom du joueur">
    </div>
    <div>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="l'age du joueur">
    </div>
    <div>
        <label for="size">Taille</label>
        <input type="text" name="size" id="size" placeholder="la taille du joueur">
    </div>
    <div>
        <label for="speed">Vitesse</label>
        <input type="text" name="speed" id="speed" placeholder="la vitesse du joueur">
    </div>
    <div>
        <label for="country">Pays</label>
        <input type="text" name="country" id="country" placeholder="la pays du joueur">
    </div>
    <div>
        <label for="team">Team</label>
       <select name="team_id" id="team_id">
            @foreach ($teams as $team)
            <option value="{{ $team->id }}">
                {{ $team->name }}
            </option>
                
            @endforeach
       </select>
    </div>

    <div>
        <label for="photo">Photo</label>
        <input type="file" name="photo" id="photo">
    </div>

    <div>
        <button type="submit">Save</button>
    </div>
</form>
@endsection