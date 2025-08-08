<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatcheRequest;
use App\Models\Matche;
use App\Models\MatcheTeam;
use App\Models\Team;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class MatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $matches = Matche::with('matcheTeams.team')->get();

        return view('matches.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{

    $teams = Team::all();
    return view('matches.create', compact('teams'));

}

public function store(MatcheRequest $request)
{
    $match = Matche::create([
        'date_matche' => $request->date_matche,
        'status' => $request->status,
    ]);

    MatcheTeam::create([

        'team_id' => $request->home_team_id,
        'matche_id' => $match->id,
        'position' => 'home',
        'score' => 0

    ]);

    MatcheTeam::create([
        'team_id' => $request->away_team_id,
        'matche_id' => $match->id,
        'position' => 'away',
        'score' => 0
    ]);

    return redirect()->route('matches.index');
}

public function updateScore(Request $request, Matche $matche)
{
    $request->validate([
        'home_score' => 'required|integer|min:0',
        'away_score' => 'required|integer|min:0',
    ]);

    // Met à jour le score des deux équipes
    $matche->matcheTeams()->where('position', 'home')->update([
        'score' => $request->home_score
    ]);

    $matche->matcheTeams()->where('position', 'away')->update([
        'score' => $request->away_score
    ]);

    return back()->with('success', 'Scores mis à jour avec succès.');
}

    /**
     * Display the specified resource.
     */
public function show(Matche $matche)
{
    $matche->load([
        'matcheTeams.team',
        'matcheTeams.goals.player',
    ]);

    return view('matches.show', compact('matche'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //

        $teams = Team::all();
        $matche = Matche::find($id);

        return view('matches.edit', [
            'teams' =>$teams,
            'matche' =>$matche
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatcheRequest $request, String $id)
    {
        
         $match = Matche::create([
        'date_matche' => $request->date_matche,
        'status' => $request->status,
    ]);

    MatcheTeam::find($id)->update([

        'team_id' => $request->home_team_id,
        'matche_id' => $match->id,
        'position' => 'home',
        'score' => 0

    ]);

    MatcheTeam::find($id)->update([
        'team_id' => $request->away_team_id,
        'matche_id' => $match->id,
        'position' => 'away',
        'score' => 0
    ]);

    return redirect()->route('matches.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
       Matche::find($id)->delete();
       return redirect()->route('matches.index');
    }
}
