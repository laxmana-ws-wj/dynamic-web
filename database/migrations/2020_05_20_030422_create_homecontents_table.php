<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomecontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homecontents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',500);
            $table->string('sub_title',500);
            $table->string('description',2000);
            $table->string('our_vision',2000);
            $table->string('our_vision',2000);
            $table->string('image',500);
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
        Schema::dropIfExists('homecontents');
    }
}
