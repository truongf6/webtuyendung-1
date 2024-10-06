<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('description');
            $table->string('thumb')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('location');
            $table->text('requirements');
            $table->enum('type', ['full_time', 'part_time', 'internship']);
            $table->foreignId('job_categories_id')->constrained('job_categories');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
