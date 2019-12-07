<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date');
            $table->string('establishment');
            $table->string('gun');
            $table->boolean('vehicle')->nullable();
            $table->string('vehicle_name')->nullable();
            $table->string('type_id');
            $table->timestamps();
            $table->unsignedBigInteger('scene_id')->nullable();
            $table->unsignedBigInteger('place_id')->nullable();

            // $table->unsignedBigInteger('scene')->references('id')->on('scenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crimes');
    }
}
