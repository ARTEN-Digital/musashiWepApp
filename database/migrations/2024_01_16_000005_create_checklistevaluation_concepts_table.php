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
        Schema::create('checklistevaluation_concepts', function (
            Blueprint $table
        ) {
            $table->id();
            $table->unsignedBigInteger('id_checklistevaluation');
            $table->unsignedBigInteger('id_concepts');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklistevaluation_concepts');
    }
};
