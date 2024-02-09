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
        Schema::table('concepts', function (Blueprint $table) {
            $table
                ->foreign('id_topics')
                ->references('id')
                ->on('topics')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('id_user')
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
        Schema::table('concepts', function (Blueprint $table) {
            $table->dropForeign(['topics_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
