<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanetsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('galaxy_id', false, true);
            $table->string('uuid')->unique();
            $table->string('name')->unique();
            $table->text('description');
            $table->integer('diameter')->nullable()->default(null);
            $table->string('climate');
            $table->smallInteger('rotation_period_hours');
            $table->bigInteger('population')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planets');
    }
}
