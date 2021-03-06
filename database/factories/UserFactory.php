<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

use Faker\Generator as Faker;
use Orion\Travelr\Models\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'remember_token' => str_random(10),
    ];
});

