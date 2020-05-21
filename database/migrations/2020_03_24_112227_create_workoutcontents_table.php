<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutcontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workoutcontents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('top_description',2000);
            $table->string('fitness_image',200);
            $table->string('fitness_description',2000);
            $table->string('mobility_image',200);
            $table->string('mobility_description',2000);
            $table->string('mindset_image',200);
            $table->string('mindset_description',2000);
            $table->string('nutrition_image',200);
            $table->string('nutrition_description',2000);
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
        Schema::dropIfExists('workoutcontents');
    }
}
