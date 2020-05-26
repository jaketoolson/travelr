<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

use Faker\Generator as Faker;
use Orion\Travelr\Models\Review;

$factory->define(Review::class, static function (Faker $faker) {
    return [
        'user_id' => 1,
        'planet_id' => 1,
        'rating' => random_int(Review::MIN_RATING, Review::MAX_RATING),
        'title' => implode(' ', $faker->words(random_int(3,6))),
        'description' => $faker->paragraph(random_int(1,2))
    ];
});

