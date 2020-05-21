<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactuscontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactuscontents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('call_us_now_1',13);
            $table->string('call_us_now_2',13);
            $table->string('our_email');
            $table->string('our_address', 1000);
            $table->string('map_link', 2000);
            $table->string('fb_link', 2000);
            $table->string('tw_link', 2000);
            $table->string('li_link', 2000);
            $table->string('image', 2000);
            $table->string('description', 2000);
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
        Schema::dropIfExists('contactuscontents');
    }
}
