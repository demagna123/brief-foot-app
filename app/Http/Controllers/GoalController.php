<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoalRequest;
use App\Models\Goal;
use App\Models\Matche;
use App\Models\MatcheTeam;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $goals = Goal::with(['player', 'matcheTeam.team', 'matcheTeam.matche'])->latest()->get();


    return view('goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $matcheTeams = MatcheTeam::with('matche', 'team')->get();
    $players = Player::all();

    return view('goals.create', compact('matcheTeams', 'players'));
}


    /**
     * Store a newly created resource in storage.
     */
public function store(GoalRequest $request)
{


     $goal = Goal::create([
        'matche_team_id' => $request->matche_team_id,
        'player_id' => $request->player_id,
        'minutes' => $request->minutes,
        'secondes' => $request->secondes,
    ]);

    // Optionnel : mettre à jour le score automatiquement
    $goal->matcheTeam->increment('score');

    return redirect()->route('matches.index');
}


    /**
     * Display the specified resource.
     */
public function show($id)
{
    $goal = Goal::with([
        'matcheTeam.matche',
        'matcheTeam.team',
        'player',
    ])->findOrFail($id);

    return view('goals.show', compact('goal'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goal $goal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goal $goal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal)
    {
        //
    }
}
