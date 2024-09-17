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
        Schema::table('reviews', function (Blueprint $table) {
            // Drop the foreign key constraint for student_id
            $table->dropForeign(['student_id']);

            // Rename the column from student_id to user_id
            $table->renameColumn('student_id', 'user_id');

            // Add the foreign key constraint for user_id
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Drop the foreign key constraint for user_id
            $table->dropForeign(['user_id']);

            // Rename the column back from user_id to student_id
            $table->renameColumn('user_id', 'student_id');

            // Add the foreign key constraint for student_id
            $table->foreign('student_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }
};
