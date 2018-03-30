<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

use Faker\Generator as Faker;
use Orion\Travelr\Models\Galaxy;

$factory->define(Galaxy::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});

