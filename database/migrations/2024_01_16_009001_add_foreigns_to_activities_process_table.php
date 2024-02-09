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
        Schema::table('activities_process', function (Blueprint $table) {
            $table
                ->foreign('id_activities')
                ->references('id')
                ->on('activities')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('id_process')
                ->references('id')
                ->on('processes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities_process', function (Blueprint $table) {
            $table->dropForeign(['id_activities']);
            $table->dropForeign(['id_process']);
        });
    }
};
