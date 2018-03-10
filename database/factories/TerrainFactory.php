<?php

use Faker\Generator as Faker;
use Orion\Travelr\Terrain;

$factory->define(Terrain::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'description' => '',
    ];
});
