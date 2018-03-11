<?php

use Illuminate\Database\Seeder;
use Orion\Travelr\Planet;

class PlanetPhotos extends Seeder
{
    private $photos = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = $this->getAllPhotos();
        $planets = Planet::all();

        foreach ($planets as $planet) {
            $photoKey = $this->getRandomPhotoKey();
            $photoData = pathinfo($photos[$photoKey]);

            if ($photoData['basename'] === '.DS_Store') {
                continue;
            }

            $file = new \Orion\Travelr\File([
               'file_name' => $photoData['basename'],
               'file_path' => $photoData['dirname'] . DIRECTORY_SEPARATOR . $photoData['basename']
            ]);

            $planet->photo()->save($file);

            unset($this->photos[$photoKey]);
        }
    }

    private function getRandomPhotoKey()
    {
        $photoKey = array_rand($photos = $this->getAllPhotos(), 1);
        if (str_contains($photos[$photoKey], 'thumbs')) {
            return $this->getRandomPhotoKey();
        }

        return $photoKey;
    }

    private function getAllPhotos(): array
    {
        if (! $this->photos) {
            $this->photos =  Storage::disk('public')->allFiles('images/planets');
        }

        return $this->photos;
    }
}
