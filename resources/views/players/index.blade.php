   @extends('layouts.app')

   @section('content')
       <h2>Liste des joueurs</h2>

       @if ($players->isEmpty())
           <p>Aucun joueur enregistré.</p>
       @else
           <table border="1" cellpadding="10">
               <thead>
                   <tr>
                       <th>Nom</th>
                       <th>Équipe</th>                     
                       <th>Photo</th>
                        <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($players as $player)
                       <tr>
                           <td>{{ $player->name }}</td>
                           <td>{{ $player->team->name ?? 'Non assigné' }}</td>
                           <td>
                               <div>
                                   @if ($player->photo)
                                       <img src="{{ asset('storage/' . $player->photo) }}" alt="Photo de profil"
                                           style="width: 100px; height: 100px; ">
                                   @else
                                       <img src="{{ asset('images/default-avatar.png') }}" alt="Photo de profil par défaut"
                                           style="">
                                   @endif
                               </div>

                           </td>
                           <td>
                            <a href="{{ route('players.edit', $player->id) }}">Modifier</a>
                           </td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
       @endif

       <br>
       <a href="{{ route('players.create') }}">➕ Ajouter un joueur</a>
   @endsection
