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
        Schema::table('user_answers_checklist', function (Blueprint $table) {
            $table
                ->foreign('id_user_checklist')
                ->references('id')
                ->on('user_checklist')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('id_concept')
                ->references('id')
                ->on('concepts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            
            $table
                ->foreign('id_evaluator')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_answers_checklist', function (Blueprint $table) {
            $table->dropForeign(['id_user_checklist']);
            $table->dropForeign(['id_concept']);
            $table->dropForeign(['id_evaluator']);
        });
    }
};
