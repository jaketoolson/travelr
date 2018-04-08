<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

use Faker\Generator as Faker;

use Orion\Travelr\Models\File;

$factory->define(File::class, function (Faker $faker) {

    $fileName = str_slug($faker->name) . '.' . $faker->fileExtension;

    return [
        'uuid' => $faker->uuid,
        'file_name' => $fileName,
        'file_path' => "/var/www/infinity/beyond/{$fileName}",
    ];
});

