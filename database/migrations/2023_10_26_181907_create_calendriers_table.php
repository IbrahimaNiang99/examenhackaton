<?php

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
        Schema::create('calendriers', function (Blueprint $table) {
            $table->id();
            $table->string('cours');
            $table->string('professeur');
            $table->time('heuredebut');
            $table->time('heurefin');
            $table->enum('jour', ['Lundi', 'Mardi', 'Mercredi', 'Leudi', 'Vendredi', 'Samedi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendriers');
    }
};
