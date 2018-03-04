<?php

use Faker\Generator as Faker;
use Orion\Travelr\Galaxy;

$factory->define(Galaxy::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
