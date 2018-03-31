<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

use Orion\Travelr\Models\Galaxy;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\Terrain;
use Illuminate\Database\Seeder;

class PlanetPrices extends Seeder
{
    public function run(): void
    {
        DB::transaction(function(){
            $planets = Planet::all();

            foreach ($planets as $planet) {
                $planet->price_cents = bcmul(random_int(50, 400), 100);
                $planet->save();
            }
        });
    }
}
