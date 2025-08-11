<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $teams = Team::withCount('players')->get(); 

    return view('teams.index', compact('teams'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        
        $imagePath = null;
            if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('teams_images', 'public');
    }
        Team::create([
            'name' =>$request->name,
            'year_creation'=>$request->year_creation,
            'photo'=>$imagePath,
        ]);

        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     */
public function show(Team $team)
{
    $team->load('players'); // Charge les joueurs liés à l'équipe
    return view('teams.show', compact('team'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
       $team = Team::find($id);
       return view('teams.edite', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, String $id)
    {
          $imagePath = null;
            if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('teams_images', 'public');
    }
        Team::find($id)->update([
            'name' =>$request->name,
            'year_creation'=>$request->year_creation,
            'photo'=>$imagePath,
        ]);

        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {

        Team::find($id)->delete();
        return Redirect()->route('teams.index');

    }
}
