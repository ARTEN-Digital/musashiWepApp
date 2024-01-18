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
        Schema::table('checklistevaluation_concepts', function (
            Blueprint $table
        ) {
            $table
                ->foreign('checklistevaluation_id')
                ->references('id')
                ->on('checklist_evaluations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('concepts_id')
                ->references('id')
                ->on('concepts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checklistevaluation_concepts', function (
            Blueprint $table
        ) {
            $table->dropForeign(['checklistevaluation_id']);
            $table->dropForeign(['concepts_id']);
        });
    }
};
