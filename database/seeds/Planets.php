<?php

use Orion\Travelr\Planet;
use Orion\Travelr\Terrain;
use Illuminate\Database\Seeder;

class Planets extends Seeder
{
    public function run(): void
    {
        $planets = $this->getPlanetsData();

        DB::transaction(function () use ($planets) {
            foreach ($planets as $planet) {
                $fields = $planet['fields'];

                $population = $fields['population'];
                $rotation = $fields['rotation_period'];
                $diameter = $fields['diameter'];

                if ($population === 'unknown') {
                    $population = 0;
                }

                if ($rotation === 'unknown') {
                    $rotation = 0;
                }

                if ($diameter === 'unknown') {
                    $diameter = 0;
                }

                $p = $this->makePlanet(
                    $fields['name'],
                    $diameter,
                    $fields['climate'],
                    $rotation,
                    $population
                );

                $terrains = array_map('trim', explode(',', $fields['terrain']));
                foreach ($terrains as $terrain) {
                    $t = $this->makeTerrain($terrain);
                    $p->terrains()->attach($t->id);
                }
            }
        });
    }

    private function makePlanet(string $name, int $diameter = 0, string $climate, int $rotation = 0, int $pop = 0): Planet
    {
        return Planet::create([
            'galaxy_id' => 1,
            'name' => $name,
            'description' => '',
            'diameter' => $diameter,
            'climate' => $climate,
            'rotation_period_hours' => $rotation,
            'population' => $pop,
        ]);
    }

    private function makeTerrain(string $name): Terrain
    {
        return Terrain::firstOrCreate([
            'name' => $name,
        ]);
    }

    private function getPlanetsData(): array
    {
        $planets = file_get_contents('https://raw.githubusercontent.com/phalt/swapi/master/resources/fixtures/planets.json');

        return json_decode($planets, true);
    }
}
