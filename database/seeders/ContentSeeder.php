<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@karacavus.com')->first();

        // ── Blog Kategorileri ──────────────────────────────────────────
        $cats = [
            ['name' => 'Hafriyat',          'slug' => 'hafriyat'],
            ['name' => 'İnşaat',            'slug' => 'insaat'],
            ['name' => 'Altyapı',           'slug' => 'altyapi'],
            ['name' => 'Kentsel Dönüşüm',   'slug' => 'kentsel-donusum'],
            ['name' => 'Mevzuat',           'slug' => 'mevzuat'],
            ['name' => 'İSG',               'slug' => 'isg'],
        ];
        foreach ($cats as $c) {
            BlogCategory::firstOrCreate(['slug' => $c['slug']], array_merge($c, ['is_active' => true]));
        }

        $catMap = BlogCategory::pluck('id', 'slug');

        // ── Blog Yazıları ──────────────────────────────────────────────
        $posts = [
            [
                'blog_category_id' => $catMap['insaat'],
                'title'       => 'İnşaat Sektörü 2025\'te Yüzde 10,8 Büyüyerek Ekonominin Lokomotifi Oldu',
                'slug'        => 'insaat-sektoru-2025-buyumesi',
                'excerpt'     => 'Konut üretimi, kentsel dönüşüm ve kamu altyapı yatırımlarının iç içe geçtiği 2025\'te inşaat sektörü bir önceki yıla kıyasla yüzde 10,8 büyüdü.',
                'content'     => '<p>Türkiye ekonomisinin 2025 yılı büyümesine en yüksek katkıyı inşaat sektörü sağladı. Konut üretimi, kentsel dönüşüm projeleri ve kamu altyapı yatırımlarının iç içe geçtiği bu dönemde sektör bir önceki yıla kıyasla yüzde 10,8 oranında büyüdü.</p><p>Sektörde ücretli çalışan sayısı 1,8 milyondan 2 milyona yükselerek rekor kırdı. Karaçavuş İnşaat olarak bu büyüme sürecinin aktif bir parçası olmaktan gurur duyuyoruz.</p>',
                'cover_image' => 'assets/img/blog/blog-1.webp',
                'is_featured' => true,
                'is_active'   => true,
                'published_at'=> '2025-03-15 09:00:00',
                'meta_description' => 'Türkiye inşaat sektörü 2025 yılında yüzde 10,8 büyüme kaydetti. Detaylar haberimizde.',
            ],
            [
                'blog_category_id' => $catMap['insaat'],
                'title'       => 'TÜİK: İnşaat Maliyet Endeksi Yıllık Yüzde 23 Arttı',
                'slug'        => 'insaat-maliyet-endeksi-2025',
                'excerpt'     => 'Temmuz 2025 verilerine göre malzeme maliyetleri yüzde 18,98, işçilik maliyetleri ise yüzde 31 artış gösterdi.',
                'content'     => '<p>TÜİK\'in açıkladığı Temmuz 2025 İnşaat Maliyet Endeksi\'ne göre yıllık bazda genel maliyetler yüzde 22,98 oranında artış gösterdi. Malzeme maliyetleri yüzde 18,98 artarken, işçilik maliyetleri yüzde 31 ile en sert artışı yaşadı.</p><p>1. sınıf yapılarda metrekare başına maliyet ortalama 9.000–10.000 TL bandına yerleşti. Bu durum proje bütçelemesinde dikkatli planlama gerektirmektedir.</p>',
                'cover_image' => 'assets/img/blog/blog-2.webp',
                'is_featured' => false,
                'is_active'   => true,
                'published_at'=> '2025-08-10 09:00:00',
                'meta_description' => 'TÜİK Temmuz 2025 İnşaat Maliyet Endeksi verileri açıklandı. Malzeme ve işçilik maliyetlerindeki artış.',
            ],
            [
                'blog_category_id' => $catMap['hafriyat'],
                'title'       => 'Hafriyat Sektöründe Fiyatlar ve Dijital Dönüşüm: 2025 Tablosu',
                'slug'        => 'hafriyat-dijital-donusum-2025',
                'excerpt'     => 'GPS destekli iş makineleri, toz-gürültü kontrol sistemleri ve çevreci atık yönetimi uygulamaları hafriyat sektöründe hız kazanıyor.',
                'content'     => '<p>Artan kentsel dönüşüm ve altyapı projeleriyle hafriyat sektöründe talep yükselirken birim fiyatlar da güncellendi. Kepçe saatlik ücreti 2.500–3.000 TL, kamyon döküm ücreti ise ortalama 3.800 TL\'ye ulaştı.</p><p>Sektörde GPS destekli makine kullanımı, toz-gürültü kontrol sistemleri ve çevreci atık yönetimi uygulamaları hız kazanıyor. Karaçavuş İnşaat bu teknolojiyi tüm projelerinde aktif biçimde kullanmaktadır.</p>',
                'cover_image' => 'assets/img/blog/blog-3.webp',
                'is_featured' => true,
                'is_active'   => true,
                'published_at'=> '2025-04-20 09:00:00',
                'meta_description' => 'Hafriyat sektöründe 2025 yılı fiyatları ve dijital dönüşüm trendleri.',
            ],
            [
                'blog_category_id' => $catMap['kentsel-donusum'],
                'title'       => '"Yarısı Bizden" Kampanyası 81 İle Yaygınlaştı',
                'slug'        => 'kentsel-donusum-yarisi-bizden-2025',
                'excerpt'     => 'Risk altındaki yapı sahiplerine inşaat maliyetinin belirli bir oranında devlet desteği ve 18–48 ay kira yardımı sağlanıyor.',
                'content'     => '<p>Çevre, Şehircilik ve İklim Değişikliği Bakanlığı\'nın "Yarısı Bizden" kampanyası 2025 itibarıyla Türkiye\'nin tüm 81 iline yaygınlaştırıldı.</p><p>Risk altındaki yapı sahiplerine inşaat maliyetinin belirli bir oranında destek ve 18–48 ay arasında kira yardımı sağlanıyor. Başvurular e-Devlet üzerinden dijital ortamda alınmaya başlandı.</p>',
                'cover_image' => 'assets/img/blog/grid1.webp',
                'is_featured' => false,
                'is_active'   => true,
                'published_at'=> '2025-01-15 09:00:00',
                'meta_description' => 'Kentsel dönüşümde Yarısı Bizden kampanyası 81 ile yaygınlaştı. Başvuru şartları ve destekler.',
            ],
            [
                'blog_category_id' => $catMap['altyapi'],
                'title'       => 'Ulaştırma Bakanlığı 2025\'te 189 Milyar Liralık 44 Altyapı Projesini Tamamladı',
                'slug'        => 'altyapi-yatirimlari-2025',
                'excerpt'     => '2025 yılında 319 km bölünmüş yol, 175 köprü ve 26 tünel inşa edildi.',
                'content'     => '<p>Ulaştırma ve Altyapı Bakanlığı, 2025 yılında toplam yatırım tutarı 189 milyar lira olan 44 projeyi tamamlayarak hizmete açtı.</p><p>Bu projeler kapsamında 319 km bölünmüş yol, 175 köprü ve 26 tünel inşa edildi. KGM\'nin 2025 yıllık toplam harcaması 439,9 milyar liraya ulaşarak rekor kırdı.</p>',
                'cover_image' => 'assets/img/blog/grid2.webp',
                'is_featured' => false,
                'is_active'   => true,
                'published_at'=> '2025-12-05 09:00:00',
                'meta_description' => 'Ulaştırma Bakanlığı 2025 yılında 44 büyük altyapı projesini tamamladı.',
            ],
            [
                'blog_category_id' => $catMap['mevzuat'],
                'title'       => 'Hafriyat Yönetmeliği Güncelleniyor: Yıkım Atıkları İçin Yeni Taslak',
                'slug'        => 'hafriyat-yonetmeligi-2025',
                'excerpt'     => 'Yeni düzenleme; yıkım faaliyetlerinin güvenli yürütülmesi ve hafriyat atıklarının geri kazanımını daha sıkı kurallara bağlıyor.',
                'content'     => '<p>Çevre, Şehircilik ve İklim Değişikliği Bakanlığı, mevcut "Hafriyat Toprağı, İnşaat ve Yıkıntı Atıklarının Kontrolü Yönetmeliği"ni kapsayan yeni bir taslağı kamuoyunun görüşüne açtı.</p><p>Yeni düzenleme; yıkım faaliyetlerinin güvenli yürütülmesi, hafriyat atıklarının geri kazanımı ve çevre dostu bertaraf süreçlerini daha sıkı kurallara bağlıyor. Belediyeler ve özel sektör, gerekli izinleri almadan hafriyat başlatamayacak.</p>',
                'cover_image' => 'assets/img/blog/grid3.webp',
                'is_featured' => false,
                'is_active'   => true,
                'published_at'=> '2025-02-10 09:00:00',
                'meta_description' => 'Hafriyat yönetmeliği güncelleniyor. Yıkım atıkları için yeni kurallar neler?',
            ],
        ];

        foreach ($posts as $p) {
            Post::firstOrCreate(['slug' => $p['slug']], array_merge($p, ['user_id' => $admin->id]));
        }

        // ── Hizmetler ─────────────────────────────────────────────────
        $services = [
            [
                'title'    => 'Hafriyat ve Kazı',
                'slug'     => 'hafriyat-ve-kazi',
                'icon'     => 'flaticon-008-machine-1',
                'cover_image' => 'assets/img/service/service-1.webp',
                'excerpt'  => 'Konut, sanayi ve altyapı projelerine yönelik her ölçekte toprak kazı ve hafriyat hizmetleri sunuyoruz.',
                'content'  => '<p>Karaçavuş İnşaat olarak modern iş makinelerimiz ve deneyimli operatörlerimizle konut, sanayi tesisi, yol ve altyapı projelerine yönelik her ölçekte hafriyat ve kazı hizmetleri gerçekleştiriyoruz. GPS destekli ekipmanlarımız sayesinde milimetrik hassasiyetle çalışıyor, proje takvimlerine eksiksiz uyum sağlıyoruz.</p>',
                'order'    => 1,
                'is_active'=> true,
                'meta_description' => 'Profesyonel hafriyat ve kazı hizmetleri. Modern ekipman ve uzman kadro ile her ölçekte proje.',
            ],
            [
                'title'    => 'Toprak Taşıma',
                'slug'     => 'toprak-tasima',
                'icon'     => 'flaticon-006-truck',
                'cover_image' => 'assets/img/service/service-2.webp',
                'excerpt'  => 'Modern kamyon filomuzla hafriyat molozunu ve toprağı hızlı, güvenli ve ekonomik biçimde taşıyoruz.',
                'content'  => '<p>Geniş araç filomuzla hafriyat toprağını, moloz ve inşaat atıklarını belirlenen sahalara hızlı ve güvenli biçimde taşıyoruz. Tüm taşımacılık işlemlerinde çevre mevzuatına tam uyum sağlıyoruz.</p>',
                'order'    => 2,
                'is_active'=> true,
                'meta_description' => 'Toprak ve moloz taşıma hizmetleri. Geniş araç filosu ile güvenli ve hızlı teslimat.',
            ],
            [
                'title'    => 'Yıkım Hizmetleri',
                'slug'     => 'yikim-hizmetleri',
                'icon'     => 'flaticon-014-robot-arm',
                'cover_image' => 'assets/img/service/service-3.webp',
                'excerpt'  => 'Kontrollü yıkım operasyonlarıyla bina, tesis ve altyapı yapılarını güvenle ortadan kaldırıyoruz.',
                'content'  => '<p>Lisanslı yıkım ekiplerimiz ve özel ekipmanlarımızla konut, sanayi tesisi ve altyapı yapılarının kontrollü yıkımını gerçekleştiriyoruz. Yıkım öncesi hasar tespiti, güvenlik planlaması ve çevre koruma tedbirleri eksiksiz uygulanır.</p>',
                'order'    => 3,
                'is_active'=> true,
                'meta_description' => 'Kontrollü yıkım hizmetleri. Güvenli ve çevre dostu yıkım operasyonları.',
            ],
            [
                'title'    => 'Altyapı Çalışmaları',
                'slug'     => 'altyapi-calismalari',
                'icon'     => 'flaticon-018-power-tower',
                'cover_image' => 'assets/img/service/service-4.webp',
                'excerpt'  => 'Su, kanalizasyon, doğalgaz ve elektrik altyapısı tesis çalışmalarında deneyimli ekibimizle hizmetinizdeyiz.',
                'content'  => '<p>Su, kanalizasyon, doğalgaz ve elektrik altyapısı tesis projelerinde uzman mühendis kadromuz ve deneyimli saha ekiplerimizle kaliteli hizmet sunuyoruz. Tüm altyapı çalışmalarında ilgili yönetmeliklere tam uyum sağlıyoruz.</p>',
                'order'    => 4,
                'is_active'=> true,
                'meta_description' => 'Altyapı tesis çalışmaları. Su, kanalizasyon, doğalgaz ve elektrik hatları.',
            ],
            [
                'title'    => 'Dolgu ve Tesviye',
                'slug'     => 'dolgu-ve-tesviye',
                'icon'     => 'flaticon-016-gear',
                'cover_image' => 'assets/img/service/service-5.webp',
                'excerpt'  => 'Proje alanlarının zemin düzeltme, dolgu ve tesviye işlemlerini hassasiyetle gerçekleştiriyoruz.',
                'content'  => '<p>Bina temeli, yol altı ve sanayi sahası gibi projelerde zemin hazırlık, dolgu ve tesviye işlemlerini modern ekipmanlarımızla ve teknik standartlara uygun biçimde gerçekleştiriyoruz. Sıkıştırma deneyleri ve zemin etüt raporlarıyla kalite güvencesi sağlıyoruz.</p>',
                'order'    => 5,
                'is_active'=> true,
                'meta_description' => 'Dolgu ve tesviye hizmetleri. Zemin hazırlık ve sıkıştırma çalışmaları.',
            ],
            [
                'title'    => 'Kaya Patlatma',
                'slug'     => 'kaya-patlatma',
                'icon'     => 'flaticon-013-danger',
                'cover_image' => 'assets/img/service/service-6.webp',
                'excerpt'  => 'Lisanslı patlayıcı uzmanlarımızla zorlu zemin koşullarında güvenli kaya patlatma hizmeti sağlıyoruz.',
                'content'  => '<p>Sert zemin ve kaya koşullarında lisanslı patlayıcı uzmanlarımız eşliğinde güvenli ve kontrollü kaya patlatma hizmetleri sunuyoruz. Tünel, temel kazısı ve yol açma projelerinde titiz güvenlik protokolleri ile çalışıyoruz.</p>',
                'order'    => 6,
                'is_active'=> true,
                'meta_description' => 'Kaya patlatma hizmetleri. Lisanslı uzmanlarla güvenli patlayıcı operasyonları.',
            ],
        ];

        foreach ($services as $s) {
            Service::firstOrCreate(['slug' => $s['slug']], $s);
        }

        // ── Projeler ──────────────────────────────────────────────────
        $projects = [
            ['title'=>'Ankara–Konya Yol Projesi',         'slug'=>'ankara-konya-yol-projesi',         'category'=>'Hafriyat',  'location'=>'Ankara/Konya', 'year'=>'2024', 'cover_image'=>'assets/img/projects/project1-m.webp',  'is_featured'=>true,  'order'=>1],
            ['title'=>'Çankaya Konut Sitesi Hafriyatı',   'slug'=>'cankaya-konut-sitesi-hafriyati',   'category'=>'Hafriyat',  'location'=>'Ankara',       'year'=>'2024', 'cover_image'=>'assets/img/projects/project2-m.webp',  'is_featured'=>true,  'order'=>2],
            ['title'=>'OSB Altyapı ve Kanalizasyon',      'slug'=>'osb-altyapi-ve-kanalizasyon',      'category'=>'Altyapı',   'location'=>'Ankara',       'year'=>'2023', 'cover_image'=>'assets/img/projects/project3-m.webp',  'is_featured'=>false, 'order'=>3],
            ['title'=>'Hirfanlı Baraj Dolgu İşleri',      'slug'=>'hirfanli-baraj-dolgu-isleri',      'category'=>'Dolgu',     'location'=>'Kırşehir',     'year'=>'2023', 'cover_image'=>'assets/img/projects/project4-m.webp',  'is_featured'=>false, 'order'=>4],
            ['title'=>'Sincan Sanayi Tesisi Yıkımı',      'slug'=>'sincan-sanayi-tesisi-yikimi',      'category'=>'Yıkım',     'location'=>'Ankara',       'year'=>'2023', 'cover_image'=>'assets/img/projects/project5-m.webp',  'is_featured'=>false, 'order'=>5],
            ['title'=>'Kuzey Ankara Tünel Kazısı',        'slug'=>'kuzey-ankara-tunel-kazisi',        'category'=>'Hafriyat',  'location'=>'Ankara',       'year'=>'2022', 'cover_image'=>'assets/img/projects/project6-m.webp',  'is_featured'=>true,  'order'=>6],
            ['title'=>'Ankara Metro Altyapı Çalışması',   'slug'=>'ankara-metro-altyapi-calismasi',   'category'=>'Altyapı',   'location'=>'Ankara',       'year'=>'2022', 'cover_image'=>'assets/img/projects/project7.webp',    'is_featured'=>false, 'order'=>7],
            ['title'=>'Keçiören Köprü Temel Kazısı',      'slug'=>'kecioren-kopru-temel-kazisi',      'category'=>'Hafriyat',  'location'=>'Ankara',       'year'=>'2022', 'cover_image'=>'assets/img/projects/project8.webp',    'is_featured'=>false, 'order'=>8],
            ['title'=>'Etimesgut Toplu Konut Hafriyatı',  'slug'=>'etimesgut-toplu-konut-hafriyati',  'category'=>'Hafriyat',  'location'=>'Ankara',       'year'=>'2021', 'cover_image'=>'assets/img/projects/project9.webp',    'is_featured'=>false, 'order'=>9],
            ['title'=>'Gebze Lojistik Merkezi Zemini',    'slug'=>'gebze-lojistik-merkezi-zemini',    'category'=>'Dolgu',     'location'=>'Kocaeli',      'year'=>'2021', 'cover_image'=>'assets/img/projects/project10.webp',   'is_featured'=>false, 'order'=>10],
            ['title'=>'Maltepe Sahil Dolgu Projesi',      'slug'=>'maltepe-sahil-dolgu-projesi',      'category'=>'Dolgu',     'location'=>'İstanbul',     'year'=>'2021', 'cover_image'=>'assets/img/projects/project11.webp',   'is_featured'=>false, 'order'=>11],
            ['title'=>'Pendik Sanayi Bölgesi Yıkım',     'slug'=>'pendik-sanayi-bolgesi-yikim',      'category'=>'Yıkım',     'location'=>'İstanbul',     'year'=>'2020', 'cover_image'=>'assets/img/projects/project12.webp',   'is_featured'=>false, 'order'=>12],
        ];

        foreach ($projects as $p) {
            Project::firstOrCreate(['slug' => $p['slug']], array_merge($p, [
                'excerpt'  => $p['title'] . ' — ' . $p['category'] . ' projesi.',
                'content'  => '<p>' . $p['title'] . ' projesi başarıyla tamamlanmıştır.</p>',
                'is_active'=> true,
            ]));
        }
    }
}
