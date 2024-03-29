<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checklistevaluation_trainings', function (
            Blueprint $table
        ) {
            $table->unsignedBigInteger('id_trainings');
            $table->unsignedBigInteger('id_checklistevaluation');
            $table->bigIncrements('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklistevaluation_trainings');
    }
};
