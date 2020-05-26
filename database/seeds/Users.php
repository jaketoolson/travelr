<?php
/**
 * Copyright (c) Jake Toolson 2020.
 */

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    public function run(): void
    {
        factory(\Orion\Travelr\Models\User::class)->times(30)->create();
    }
}
