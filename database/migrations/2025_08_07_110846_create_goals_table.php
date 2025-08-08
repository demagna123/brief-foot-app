<?php

use App\Models\Matche;
use App\Models\MatcheTeam;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MatcheTeam::class);
            $table->foreignIdFor(Player::class); 
            $table->integer('minutes');
            $table->integer('secondes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
