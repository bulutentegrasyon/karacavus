<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $companies = [
            [
                'slug'        => 'karacavus-proje-gelistirme',
                'name'        => 'Karaçavuş Proje Geliştirme İnşaat Ltd. Şti.',
                'short'       => 'Karaçavuş Proje Geliştirme',
                'number'      => '01',
                'icon'        => 'flaticon-020-planning',
                'tagline'     => 'Grubun kurucu ve ana şirketi',
                'sector'      => 'Hafriyat · İnşaat · Proje Geliştirme',
                'established' => '2001',
                'about'       => 'Karaçavuş Proje Geliştirme İnşaat Ltd. Şti., 2001 yılında kurulmuş olup Karaçavuş Şirketler Grubu\'nun ana kuruluşudur. 25 yılı aşkın tecrübesiyle konut, sanayi, altyapı ve ulaşım projelerinde yurt genelinde yüzlerce başarılı işe imza atmıştır. Modern iş makinesi filosu, lisanslı mühendis kadrosu ve güçlü alt yüklenici ağıyla her ölçekteki projeye çözüm üretmektedir.',
                'activities'  => [
                    'Büyük ölçekli hafriyat ve kazı projeleri',
                    'Proje geliştirme ve arazi düzenleme',
                    'Toprak dolgu ve kompaksiyon çalışmaları',
                    'Kamu ve özel sektör inşaat ihaleleri',
                    'Altyapı ve üstyapı yapım işleri',
                    'Yıkım ve moloz kaldırma operasyonları',
                ],
                'address'     => 'Soğanlık Yeni Mah. Pega Gaz Sk. Aura Residence No:4/A K.6 D.48 Kartal / İstanbul',
                'map_query'   => 'Aura+Residence+Soğanlık+Yeni+Mah+Pegagaz+Sokak+Kartal+Istanbul',
                'phone'       => '0539 730 50 65',
                'vision'      => '2001\'den bu yana 850\'yi aşkın proje, 420 memnun müşteri ve 24 yıllık sektör deneyimiyle Türkiye\'nin güvenilir inşaat grubu olmaya devam ediyoruz.',
                'order'       => 1,
            ],
            [
                'slug'        => 'asel-insaat-hafriyat',
                'name'        => 'Asel Alt ve Üst Yapı İnşaat Hafriyat Otomotiv San. ve Tic. Ltd. Şti.',
                'short'       => 'Asel İnşaat Hafriyat',
                'number'      => '02',
                'icon'        => 'flaticon-008-machine-1',
                'tagline'     => 'Altyapı, üstyapı ve otomotiv hizmetleri',
                'sector'      => 'Altyapı · Üstyapı · Otomotiv',
                'established' => '2005',
                'about'       => 'Asel Alt ve Üst Yapı İnşaat Hafriyat Otomotiv San. ve Tic. Ltd. Şti., altyapı ve üstyapı inşaat projelerini otomotiv lojistik hizmetleriyle tek çatı altında birleştiren çok disiplinli bir yapıya sahiptir. Karayolu, köprü, viyadük ve kentsel dönüşüm projelerinde deneyim sahibi olan şirket, büyük kamu ihalelerinde ve özel sektör projelerinde etkin rol üstlenmektedir.',
                'activities'  => [
                    'Karayolu ve köprü altyapı çalışmaları',
                    'Üstyapı beton ve asfalt uygulamaları',
                    'Kentsel dönüşüm ve yenileme projeleri',
                    'Ağır yük lojistik ve otomotiv hizmetleri',
                    'İş makinesi kiralama ve operatör temini',
                    'Sanayi tesisi inşaatı',
                ],
                'address'     => 'Soğanlık Yeni Mah. Pega Gaz Sk. Aura Residence No:4/A K.6 D.48 Kartal / İstanbul',
                'map_query'   => 'Aura+Residence+Soğanlık+Yeni+Mah+Pegagaz+Sokak+Kartal+Istanbul',
                'phone'       => '0539 730 50 65',
                'vision'      => 'Altyapı ve otomotiv sektörlerinde entegre hizmet anlayışıyla Türkiye\'nin dört bir yanında güvenilir çözümler sunuyoruz.',
                'order'       => 2,
            ],
            [
                'slug'        => 'omkar-otomotiv-insaat',
                'name'        => 'Ömkar Otomotiv İnşaat Sanayi ve Tic. Ltd. Şti.',
                'short'       => 'Ömkar Otomotiv',
                'number'      => '03',
                'icon'        => 'flaticon-006-truck',
                'tagline'     => 'Binek, hafriyat kamyonu ve iş makinesi alım satımında uzman galeri',
                'sector'      => 'Otomotiv · Ticari Araç',
                'established' => '2008',
                'about'       => 'Ömkar Otomotiv İnşaat Sanayi ve Tic. Ltd. Şti., binek otomobil alım satımından hafriyat kamyonları ve iş makinesi ticaretine uzanan geniş bir portföyle Karaçavuş Şirketler Grubu\'nun otomotiv kanadını oluşturmaktadır. Sahibinden.com üzerinden aktif ilan yönetimiyle hem bireysel hem de kurumsal alıcılara araç ve makine temini konusunda güvenilir hizmet vermektedir. Grubun kendi projelerinde kullanılan ekipmanların alım, satım ve yenileme süreçleri de şirket tarafından yönetilmektedir.',
                'activities'  => [
                    'Binek araç alım ve satımı',
                    'Hafriyat kamyonu alım ve satımı',
                    'İş makinesi (ekskavatör, yükleyici, dozer) ticareti',
                    'Kurumsal filo yenileme ve danışmanlığı',
                    'İkinci el ticari araç değerleme',
                    'Sahibinden.com üzerinden aktif ilan yönetimi',
                ],
                'address'     => 'Yayalar Mah. Barbaros H. Paşa Cad. No:5 Pendik / İstanbul',
                'map_query'   => 'Yayalar+Mah+Barbaros+Hayrettin+Paşa+Cad+No+5+Pendik+Istanbul',
                'phone'       => '0530 146 71 65',
                'vision'      => 'Otomotiv ve iş makinesi ticaretinde dürüst, şeffaf ve güvenilir hizmet anlayışıyla hem bireysel hem kurumsal müşterilerin tercihi olmayı sürdürüyoruz.',
                'order'       => 3,
            ],
            [
                'slug'        => 'nayifogullari-insaat',
                'name'        => 'Nayifoğulları İnşaat San. ve Tic. Ltd. Şti.',
                'short'       => 'Nayifoğulları İnşaat',
                'number'      => '04',
                'icon'        => 'flaticon-037-forklift',
                'tagline'     => 'Genel inşaat ve sanayi hizmetleri',
                'sector'      => 'İnşaat · Sanayi · Ticaret',
                'established' => '2010',
                'about'       => 'Nayifoğulları İnşaat San. ve Tic. Ltd. Şti., uzun yılların birikimi ve güçlü sahaya dayalı deneyimiyle genel inşaat ve nakliye hizmetleri sunmaktadır. Grubun kapasite ve coğrafi erişimini genişleten şirket, sanayi ve ticaret alanındaki geniş ağı sayesinde tedarik zinciri yönetiminde de kritik rol üstlenmektedir.',
                'activities'  => [
                    'Genel yapı inşaatı ve taahhüt işleri',
                    'Sanayi yapıları ve depo inşaatı',
                    'Altyapı destek hizmetleri',
                    'İnşaat malzemesi tedariki',
                    'Taşeronluk ve proje yönetimi',
                    'Nakliye ve lojistik koordinasyonu',
                ],
                'address'     => 'Yayalar Mah. Barbaros H. Paşa Cad. No:5 Pendik / İstanbul',
                'map_query'   => 'Yayalar+Mah+Barbaros+Hayrettin+Paşa+Cad+No+5+Pendik+Istanbul',
                'phone'       => null,
                'vision'      => 'Güvenilirlik ve hız ilkeleriyle her projede katma değer yaratıyoruz.',
                'order'       => 4,
            ],
            [
                'slug'        => 'nayifogullari-ymk-yikim',
                'name'        => 'Nayifoğulları İnşaat YMK Yıkım Adi Ortaklığı',
                'short'       => 'Nayifoğulları YMK Yıkım',
                'number'      => '05',
                'icon'        => 'flaticon-016-gear',
                'tagline'     => 'Kontrollü yıkım ve kentsel dönüşüm',
                'sector'      => 'Yıkım · Kentsel Dönüşüm',
                'established' => '2015',
                'about'       => 'Nayifoğulları İnşaat YMK Yıkım Adi Ortaklığı, Nayifoğulları İnşaat ile YMK\'nın ortak girişimiyle kurulmuştur. Lisanslı yıkım ekipleri ve iş güvenliği odaklı çalışma anlayışıyla kentsel dönüşüm projelerinde kontrollü, hızlı ve güvenli yıkım hizmetleri sunmaktadır. Patlayıcı ve mekanik yıkım konularında uzmanlaşmış kadrosuyla sektörde öne çıkmaktadır.',
                'activities'  => [
                    'Kontrollü bina yıkımı',
                    'Mekanik ve patlayıcılı yıkım',
                    'Kentsel dönüşüm yıkım projeleri',
                    'Endüstriyel tesis sökümü',
                    'Yıkım atığı ayrıştırma ve taşıma',
                    'İş güvenliği planlaması ve denetimi',
                ],
                'address'     => 'Aşağı Kirazca Mah. Kışla Cad. No:31 Arifiye / Sakarya',
                'map_query'   => 'Aşağı+Kirazca+Mah+Kışla+Cad+No+31+Arifiye+Sakarya',
                'phone'       => null,
                'vision'      => 'Güvenli ve çevre dostu yıkım uygulamalarıyla kentsel dönüşümün güvenilir ortağıyız.',
                'order'       => 5,
            ],
        ];

        foreach ($companies as $co) {
            Company::create($co);
        }
    }
}
