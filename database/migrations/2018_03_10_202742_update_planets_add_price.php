<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlanetsAddPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planets', function(Blueprint $table){
            $table->bigInteger('price_cents')->default(0)->after('population');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planets', function(Blueprint $table){
           $table->dropColumn('price_cents');
        });
    }
}
