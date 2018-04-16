<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmenitiesTblRemoveFacility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction( function () {
            Schema::dropIfExists('facility_planet');
            Schema::create('amenities', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('uuid')->unique();
                $table->string('name')->unique();
                $table->string('slug')->unique();
                $table->text('description')->nullable()->default(null);
                $table->dateTime('is_active')->nullable()->default(null);
                $table->timestamps();
                $table->softDeletes();
            });
            Schema::create('amenity_planet', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('amenity_id', false, true);
                $table->bigInteger('planet_id', false, true);
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
