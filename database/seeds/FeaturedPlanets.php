<?php

use Illuminate\Database\Seeder;

class FeaturedPlanets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planets = \Orion\Travelr\Planet::all()->random(8);

        foreach ($planets as $planet) {
            $planet->featured = \Carbon\Carbon::now();
            $planet->save();
        }
    }
}
