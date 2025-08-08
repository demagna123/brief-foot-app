<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
       $teams = Team::withCount('players')->get(); // pour compter les joueurs

    return view('teams.index', compact('teams'));
    }
}
