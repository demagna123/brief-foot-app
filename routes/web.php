<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MatcheController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
Route::get('/', [MainController::class, 'home']);

Route::get('/teams/index', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
Route::middleware(AuthMiddleware::class)->group(function(){

Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('/teams/create', [TeamController::class, 'store'])->name('teams.store');
Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
Route::put('/teams/update/{id}', [TeamController::class, 'update'])->name('teams.update');
Route::delete('/teams/destroy/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');


Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
Route::get('/players/edit/{id}', [PlayerController::class, 'edit'])->name('players.edit');
Route::put('/players/update/{id}', [PlayerController::class, 'update'])->name('players.update');
Route::delete('/players/destroy/{id}', [PlayerController::class, 'destroy'])->name('players.destroy');

Route::get('/matches/create',[MatcheController::class, 'create'])->name('matches.create');
Route::post('/matches/store',[MatcheController::class, 'store'])->name('matches.store');
Route::get('/matches/edit/{id}',[MatcheController::class, 'edit'])->name('matches.edit');
Route::put('/matches/update/{id}',[MatcheController::class, 'update'])->name('matches.update');
Route::delete('/matches/destroy/{id}',[MatcheController::class, 'destroy'])->name('matches.destroy');
Route::put('/matches/{matche}/update-score', [MatcheController::class, 'updateScore'])->name('matches.update-score');

Route::get('/goals/create',[GoalController::class, 'create'])->name('goals.create');
Route::post('/goals/store',[GoalController::class, 'store'])->name('goals.store');
Route::get('/goals/edit/{id}',[GoalController::class, 'edit'])->name('goals.edit');
Route::put('/goals/update/{id}',[GoalController::class, 'update'])->name('goals.update');
Route::delete('/goals/destroy/{id}',[GoalController::class, 'destroy'])->name('goals.destroy');


});
Route::get('/players/show/{id}', [PlayerController::class, 'show'])->name('players.show');
Route::get('/players/index', [PlayerController::class, 'index'])->name('players.index');
Route::get('/matches/index',[MatcheController::class, 'index'])->name('matches.index');
Route::get('/matches/{matche}', [MatcheController::class, 'show'])->name('matches.show');
Route::get('/goals/show/{id}',[GoalController::class, 'show'])->name('goals.show');
Route::get('/goals/index',[GoalController::class, 'index'])->name('goals.index');
Route::get('/users/login', [AuthController::class, 'loginform'])->name('loginform');
Route::get('/users/login', [AuthController::class, 'loginform'])->name('loginform');
Route::post('/users/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profil', [AuthController::class, 'profil'])->name('profil');

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/send-code', [AuthController::class, 'sendCode'])->name('password.code.send');

Route::get('/verify-code', [AuthController::class, 'showCodeForm'])->name('password.code.form');
Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('password.code.verify');

Route::get('/reset-password-form', [AuthController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');




