<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'author_name'    => 'A** V***',
                'author_company' => 'A** Yapı A.Ş.',
                'content'        => 'Karaçavuş Şirketler Grubu ile çalışmak büyük bir memnuniyet. Projemizi zamanında ve bütçe dahilinde teslim ettiler.',
                'rating'         => 5,
                'order'          => 1,
            ],
            [
                'author_name'    => 'K** A***',
                'author_company' => 'K** Yapı Taahhüt A.Ş.',
                'content'        => 'Profesyonel ekipleri ve modern ekipmanlarıyla hafriyat sürecini sorunsuz yönettiler.',
                'rating'         => 5,
                'order'          => 2,
            ],
            [
                'author_name'    => 'S** Y***',
                'author_company' => 'D** İnşaat Ltd.',
                'content'        => 'Güvenilir, hızlı ve kaliteli hizmet. Bir dahaki projemizde de tercihimiz Karaçavuş olacak.',
                'rating'         => 5,
                'order'          => 3,
            ],
        ];

        foreach ($items as $item) {
            Testimonial::create($item);
        }
    }
}
