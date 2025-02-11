<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTownHallsTable extends Migration
{
    public function up()
    {
        Schema::create('town_halls', function (Blueprint $table) {
            $table->id();
            $table->integer('level');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('town_halls');
    }
}

// this is the DB migration for the town halls as stated in the design 