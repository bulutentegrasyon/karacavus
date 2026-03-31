<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;

class ReferenceMockGallerySeeder extends Seeder
{
    public function run(): void
    {
        $allImages = [
            'assets/img/projects/real-project-01.webp',
            'assets/img/projects/real-project-02.webp',
            'assets/img/projects/real-project-03.webp',
            'assets/img/projects/real-project-04.webp',
            'assets/img/projects/real-project-05.webp',
            'assets/img/projects/real-project-06.webp',
            'assets/img/projects/real-project-07.webp',
            'assets/img/projects/real-project-08.webp',
            'assets/img/projects/real-project-09.webp',
            'assets/img/projects/real-project-10.webp',
            'assets/img/projects/real-project-11.webp',
            'assets/img/projects/real-project-12.webp',
            'assets/img/projects/real-project-13.webp',
            'assets/img/projects/real-project-14.webp',
            'assets/img/projects/real-project-15.webp',
            'assets/img/projects/real-project-16.webp',
            'assets/img/projects/real-project-17.webp',
            'assets/img/projects/real-project-18.webp',
            'assets/img/projects/real-project-19.webp',
            'assets/img/projects/real-project-21.webp',
            'assets/img/projects/real-project-22.webp',
            'assets/img/projects/real-project-23.webp',
            'assets/img/projects/real-project-24.webp',
            'assets/img/projects/real-project-25.webp',
            'assets/img/projects/real-project-26.webp',
            'assets/img/projects/real-project-27.webp',
            'assets/img/projects/real-project-28.webp',
            'assets/img/projects/real-project-29.webp',
            'assets/img/projects/real-project-30.webp',
            'assets/img/projects/real-project-31.webp',
            'assets/img/projects/real-project-32.webp',
            'assets/img/projects/real-project-33.webp',
            'assets/img/projects/real-project-34.webp',
            'assets/img/projects/real-project-35.webp',
            'assets/img/projects/real-project-36.webp',
            'assets/img/projects/real-project-37.webp',
            'assets/img/projects/real-project-38.webp',
            'assets/img/projects/real-project-39.webp',
            'assets/img/projects/real-project-40.webp',
            'assets/img/projects/real-project-41.webp',
            'assets/img/projects/real-project-42.webp',
            'assets/img/projects/real-project-43.webp',
            'assets/img/projects/real-project-44.webp',
            'assets/img/projects/real-project-45.webp',
            'assets/img/projects/real-project-46.webp',
            'assets/img/projects/real-project-47.webp',
            'assets/img/projects/real-project-48.webp',
            'assets/img/projects/real-project-49.webp',
            'assets/img/projects/real-project-50.webp',
            'assets/img/projects/real-project-51.webp',
        ];

        $total   = count($allImages);
        $refs    = Reference::all();
        $i       = 0;

        foreach ($refs as $ref) {
            // Her referansa 6 farklı görsel (dairesel)
            $gallery = [];
            for ($j = 0; $j < 6; $j++) {
                $gallery[] = $allImages[($i + $j) % $total];
            }

            $ref->cover_image = $allImages[$i % $total];
            $ref->gallery     = $gallery;
            $ref->save();

            $i += 3; // her referans 3 adım ilerlesin → çeşitlilik
        }

        $this->command->info('✓ ' . $refs->count() . ' referansa mock galeri eklendi.');
    }
}
