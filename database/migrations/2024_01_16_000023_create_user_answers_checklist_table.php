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
        Schema::create('user_answers_checklist', function (Blueprint $table) {
            $table->id();
            $table->text('firststatus')->nullable();
            $table->unsignedBigInteger('id_user_checklist');
            $table->unsignedBigInteger('id_concept');
            $table->unsignedBigInteger('id_applicant')->nullable();
            $table->text('shadowoperator')->nullable();
            $table->text('applicantcomment')->nullable();
            $table->timestamp('datefirsteval')->nullable();
            $table->text('secondstatus')->nullable();
            $table->unsignedBigInteger('id_evaluator')->nullable();
            $table->text('evaluatorcomment')->nullable();
            $table->timestamp('datesecondeval')->nullable();
            $table->text('firststatusmail')->nullable();
            $table->text('secondstatusmail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers_checklist');
    }
};
