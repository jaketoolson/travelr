<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

use Carbon\Carbon;
use Faker\Generator as Faker;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\Galaxy;

$factory->define(Planet::class, function (Faker $faker) {
    return [
        'galaxy_id' => function () {
            return factory(Galaxy::class)->create()->id;
        },
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'description' => implode(',' , $faker->paragraphs(3)),
        'diameter' => 0,
        'climate' => 'hot',
        'rotation_period_hours' => random_int(1, 24),
        'population' => random_int(100, 30000000000),
        'price_cents' => random_int(1000, 10000),
        'featured' => function () {
            return random_int(1, 2) === 1 ? Carbon::now() : null;
        }
    ];
});