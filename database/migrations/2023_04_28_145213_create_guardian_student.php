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

        Schema::create('guardian_student', function (Blueprint $table) {

            $table->integer('guardian_id')->unsigned();

            $table->integer('student_id')->unsigned();

            $table->foreign('guardian_id')->references('id')->on('guardians')

                ->onDelete('cascade');

            $table->foreign('student_id')->references('id')->on('students')

                ->onDelete('cascade');

            $table->tinyInteger('type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardian_student');
    }
};
