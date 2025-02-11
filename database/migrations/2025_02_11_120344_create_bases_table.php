<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasesTable extends Migration
{
    public function up()
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_url');
            $table->string('layout_link');
            $table->text('description');
            $table->string('base_type');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('town_hall_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('town_hall_id')->references('id')->on('town_halls')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bases');
    }
}

// this is the migration for the Create base table the fk are definied below 