<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $seedsRan = [];

    protected $table = 'seeds';

    public function __construct()
    {
        $this->seedsRan = $this->getRan();
    }

    public function run(): void
    {
        $this->call(Galaxies::class);
        $this->call(Planets::class);
        $this->call(PlanetPrices::class);
    }

    /**
     * {@inheritdoc}
     */
    public function call($class, $silent = false): void
    {
        if (!empty($class) && !in_array($class, $this->seedsRan, true)) {
            parent::call($class, $silent);

            DB::table($this->table)->insert(['seed_name' => $class]);
        } else {
            $this->command->getOutput()->writeln("<info>Seed already run, skipping:</info> $class");
        }
    }

    public function getRan(): array
    {
        return DB::table($this->table)->pluck('seed_name')->toArray();
    }
}
