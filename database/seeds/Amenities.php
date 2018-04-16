<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Amenity;
use Orion\Travelr\Models\Planet;
use Illuminate\Database\Seeder;

class Amenities extends Seeder
{
    /**
     * @var Collection
     */
    private $amenities;

    public function __construct()
    {
        $this->amenities = collect([]);
    }

    public function run(): void
    {
        $this->storeAmenities();
        $this->assignAmenitiesToPlanet();
    }

    private function assignAmenitiesToPlanet(): void
    {
        foreach (Planet::all() as $planet) {
            $amenities = $this->amenities->random(random_int(2, count($this->amenities)));
            $planet->amenities()->sync($amenities->pluck('id'));
        }
    }

    private function storeAmenities(): void
    {
        foreach ($this->amenitiesData() as $amenitySlug => $amenityData) {
            $amenity = Amenity::create([
                'slug' => $amenitySlug,
                'name' => $amenityData['name'],
                'description' => $amenityData['descr']
            ]);

            $this->amenities->push($amenity);
        }
    }

    private function amenitiesData(): array
    {
        return [
            'wifi' => [
                'name' => 'Wifi',
                'descr' => 'Free continuous wifi internet.',
            ],
            'kitchen' => [
                'name' => 'Kitchen',
                'descr' => 'Kitchen with sink, dishwasher, refridgerator, and microwave access.'
            ],
            'gym' => [
                'name' => 'Gym',
                'descr' => 'Treadmills, weights,'
            ],
            'sauna' => [
                'name' => 'Sauna',
                'descr' => 'Relax in the hot sauna.'
            ],
            'pool' => [
                'name' => 'Swimming Pool',
                'descr' => 'Private or Shared.',
            ],
            'cable' => [
                'name' => 'Cable TV',
                'descr' => 'Free television with over 400 channels.',
            ],
            'masseuse' => [
                'name' => 'Masseuse onsite',
                'descr' => 'Daily massages from our on-site Masseuse',
            ],
            'bistro' => [
                'name' => 'Bistro',
                'descr' => 'Meet, mingle and connect over a meal at the Bistro',
            ],
            'bar' => [
                'name' => 'Bar',
                'descr' => '24/7 Bar access with over 20 imported beers.'
            ],
            'continental_breakfast' => [
                'name' => 'Complimentary Breakfast',
                'descr' => 'Free breakfast available daily between 5am - 9am.'
            ]
        ];
    }
}
