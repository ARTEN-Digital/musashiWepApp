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
        Schema::create('areas_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_line');
            $table->timestamps();
        });

        Schema::table('areas_lines', function (
            Blueprint $table
        ) {
            $table
                ->foreign('id_area')
                ->references('id')
                ->on('areas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('id_line')
                ->references('id')
                ->on('lines')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checklistevaluation_trainings', function (
            Blueprint $table
        ) {
            $table->dropForeign(['id_area']);
            $table->dropForeign(['id_area']);
        });

        Schema::dropIfExists('areas_lines');

    }
};
