<?php

use App\Models\Teacher;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Teacher::class);
            $table->string('image');
            $table->string('name');
            $table->string('duration');
            $table->integer('number_pupils');
            $table->text('description');
            $table->json('who_for')->nullable();
            $table->json('advantages')->nullable();
            $table->integer('module_count');
            $table->integer('lessons_count');
            $table->string('lesson_duration');
            $table->json('topics');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
