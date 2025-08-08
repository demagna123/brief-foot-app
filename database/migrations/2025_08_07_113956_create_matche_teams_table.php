<?php

use App\Models\Matche;
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
        Schema::create('matche_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Team::class);
            $table->foreignIdFor(Matche::class);
            $table->enum('position', ['home', 'away']);
            $table->integer('score')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matche_teams');
    }
};
