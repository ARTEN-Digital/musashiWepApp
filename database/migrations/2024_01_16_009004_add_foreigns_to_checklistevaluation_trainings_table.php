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
        Schema::table('checklistevaluation_trainings', function (
            Blueprint $table
        ) {
            $table
                ->foreign('trainings_id')
                ->references('id')
                ->on('trainings')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('checklistevaluation_id')
                ->references('id')
                ->on('checklist_evaluations')
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
            $table->dropForeign(['trainings_id']);
            $table->dropForeign(['checklistevaluation_id']);
        });
    }
};
