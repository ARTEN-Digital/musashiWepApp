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
                ->foreign('id_checklistevaluation')
                ->references('id')
                ->on('checklist_evaluations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('id_concepts')
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
            $table->dropForeign(['id_checklistevaluation']);
            $table->dropForeign(['id_concepts']);
        });
    }
};
