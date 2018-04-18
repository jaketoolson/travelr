<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->bigInteger('user_id', false, true);
            $table->bigInteger('planet_id', false, true);
            $table->string('title');
            $table->text('description')->nullable()->default(null);
            $table->smallInteger('rating')->default(1);
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
        Schema::dropIfExists('reviews');
    }
}
