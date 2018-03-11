<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

use Orion\Travelr\Galaxy;
use Illuminate\Database\Seeder;

class Galaxies extends Seeder
{
    public function run(): void
    {
        foreach ($this->getGalaxyData() as $galaxy) {
            Galaxy::create([
                'name' => $galaxy
            ]);
        }
    }

    private function getGalaxyData(): array
    {
        return [
            'Comae Chronos',
            'Apus Kentaurus',
            'Gamma Orithyia',
            'Astraeus',
            'Aquarii Nebula',
            'Vortex',
        ];
    }
}
