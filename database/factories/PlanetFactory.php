<?php

use Faker\Generator as Faker;
use Orion\Travelr\Planet;
use Orion\Travelr\Galaxy;

$factory->define(Planet::class, function (Faker $faker) {
    return [
        'galaxy_id' => function () {
            return factory(Galaxy::class)->create()->id;
        },
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->sentence,
        'diameter' => 0,
        'rotation_period_hours' => random_int(1, 24),
        'population' => random_int(100, 30000000000),
    ];
});

