<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
{
    $players = Player::with('team')->get(); 

    return view('players.index', compact('players'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $teams = Team::all();
        return view('players.create', ['teams' =>$teams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request)
    {
        //
            $imagePath = null;
            if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('players_images', 'public');
    }
        Player::create([
            'team_id'=>$request->team_id,
            'name'=>$request->name,
            'age'=>$request->age,
            'size'=>$request->size,
            'speed'=>$request->speed,
            'country'=>$request->country,
            'photo' =>$imagePath
        ]);

        return redirect()->route('players.index');
    }

    /**
     * Display the specified resource.
     */
public function show($id)
{
    $player = Player::with('team')->findOrFail($id);
    return view('players.show', compact('player'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $teams = Team::all();
        $player = Player::find($id);

        return view('players.edit', [
            'teams' =>$teams,
            'player' =>$player
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
       //
            $imagePath = null;
            if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('players_images', 'public');
    }
        Player::find($id)->update([
            'team_id'=>$request->team_id,
            'name'=>$request->name,
            'age'=>$request->age,
            'size'=>$request->size,
            'speed'=>$request->speed,
            'country'=>$request->country,
            'photo' =>$imagePath
        ]);

        return redirect()->route('players.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Player::find($id)->delete();
        return view('players.index');
    }
}
