<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;
use App\Models\Post;
use App\Models\Service;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;

// ─── Ön Yüz ─────────────────────────────────────────────────────────────────
Route::get('/', function () {
    $services    = Service::active()->take(9)->get();
    $latestPosts = Post::active()->with('category')->latest('published_at')->take(3)->get();
    return view('frontend.home', compact('services', 'latestPosts'));
});
Route::get('/hakkimizda', fn() => view('frontend.about'));
Route::get('/hizmetler', fn() => view('frontend.services'));
Route::get('/projeler', fn() => view('frontend.projects'));
Route::get('/iletisim', fn() => view('frontend.contact'));
Route::get('/blog', function () {
    $posts       = Post::active()->with('category')->latest('published_at')->paginate(6);
    $categories  = BlogCategory::active()->withCount(['posts' => fn($q) => $q->active()])->get();
    $recentPosts = Post::active()->latest('published_at')->take(3)->get();
    return view('frontend.blog', compact('posts', 'categories', 'recentPosts'));
});
Route::get('/blog/{slug}', function (string $slug) {
    $post        = Post::active()->with('category', 'author')->where('slug', $slug)->firstOrFail();
    $recentPosts = Post::active()->latest('published_at')->take(3)->get();
    $categories  = BlogCategory::active()->withCount(['posts' => fn($q) => $q->active()])->get();
    return view('frontend.blog-detail', compact('post', 'recentPosts', 'categories'));
})->name('blog.show');
Route::get('/hizmetler', fn() => view('frontend.services'))->name('services');
Route::get('/sirketlerimiz', fn() => view('frontend.companies'))->name('companies');

Route::get('/hizmetler/{slug}', function (string $slug) {
    $services = [
        'hafriyat-ve-temel-kazi' => [
            'slug'        => 'hafriyat-ve-temel-kazi',
            'title'       => 'Hafriyat ve Temel Kazı',
            'icon'        => 'flaticon-002-welding',
            'image'       => 'real-project-01',
            'sector'      => 'Hafriyat · Kazı · Zemin',
            'company'     => 'Karaçavuş Proje Geliştirme / Asel İnşaat Hafriyat',
            'intro'       => 'Konut, sanayi ve altyapı projelerine yönelik her ölçekte toprak kazısı ve hafriyat çalışması.',
            'description' => 'GPS destekli iş makineleri ve deneyimli operatör kadromuzla konut temel kazısından büyük ölçekli altyapı hafriyatına kadar tüm projelerde milimetrik hassasiyet sağlıyoruz. Modern ekskavatör ve yükleyici filomuz, dar takvimli ve yüksek hacimli kazı projelerinde de kesintisiz hizmet sunar. Her sahada İSG protokolleri eksiksiz uygulanmakta; toz ve gürültü kontrolü standart gereksinimler olarak hayata geçirilmektedir.',
            'features'    => [
                'Konut ve sanayi temel kazısı',
                'Yüksek hacimli derin kazı operasyonları',
                'GPS destekli hassas hafriyat',
                'Toz ve gürültü kontrol sistemleri',
                'İSG sertifikalı ekip ve ekipman',
                'Kısa sürede yüksek hacim kapasitesi',
            ],
        ],
        'toprak-tasima-ve-nakliye' => [
            'slug'        => 'toprak-tasima-ve-nakliye',
            'title'       => 'Toprak Taşıma ve Nakliye',
            'icon'        => 'flaticon-006-truck',
            'image'       => 'real-project-02',
            'sector'      => 'Nakliye · Lojistik · Filo',
            'company'     => 'Asel İnşaat Hafriyat / Nayifoğulları İnşaat',
            'intro'       => 'Geniş kamyon ve damperli araç filomuzla hafriyat toprağı ve molozları hızlı, güvenli taşıyoruz.',
            'description' => 'Tonajı yüksek damperli kamyonlardan oluşan modern filomuzla hafriyat toprağı, moloz ve inşaat malzemesini belirlenen depolama sahalarına zamanında ve güvenli biçimde ulaştırıyoruz. Saha lojistik koordinasyonu, araç takip sistemleri ve deneyimli şoför kadromuz sayesinde büyük hacimli nakliye operasyonlarında aksaklık yaşanmaz. Depolama sahası seçimi ve izin süreçlerinde de danışmanlık desteği sağlıyoruz.',
            'features'    => [
                'Yüksek tonajlı damperli kamyon filosu',
                'GPS araç takip ve saha koordinasyonu',
                'Hafriyat toprağı ve moloz taşımacılığı',
                'İnşaat malzemesi lojistiği',
                'Depolama sahası seçim danışmanlığı',
                'Çevre mevzuatına uyumlu taşıma',
            ],
        ],
        'altyapi-insaati' => [
            'slug'        => 'altyapi-insaati',
            'title'       => 'Altyapı İnşaatı',
            'icon'        => 'flaticon-010-tank-1',
            'image'       => 'real-project-24',
            'sector'      => 'Altyapı · Karayolu · Mühendislik',
            'company'     => 'Asel Alt ve Üst Yapı İnşaat Hafriyat',
            'intro'       => 'Karayolu, köprü, viyadük ile su ve kanalizasyon altyapısı projelerinde deneyimli ekibimizle hizmetinizdeyiz.',
            'description' => 'Asel Alt ve Üst Yapı bünyesinde yürütülen altyapı inşaat hizmetlerimiz; karayolu yapımı, köprü ve viyadük inşası, içme suyu ve atıksu hattı tesisi ile doğalgaz boru döşeme çalışmalarını kapsamaktadır. Kamu ihale deneyimimiz ve güçlü ekipman parkımızla büyük ölçekli kentsel altyapı projelerinde güvenilir çözümler üretiyoruz.',
            'features'    => [
                'Karayolu ve bölünmüş yol yapımı',
                'Köprü, viyadük ve menfez inşası',
                'İçme suyu ve kanalizasyon hattı',
                'Doğalgaz boru döşeme çalışmaları',
                'Kamu altyapı ihalelerinde deneyim',
                'Mühendislik ve yapım denetimi',
            ],
        ],
        'ustyapi-ve-yapi-insaati' => [
            'slug'        => 'ustyapi-ve-yapi-insaati',
            'title'       => 'Üstyapı ve Yapı İnşaatı',
            'icon'        => 'flaticon-004-walkie-talkie',
            'image'       => 'real-project-41',
            'sector'      => 'İnşaat · Konut · Sanayi',
            'company'     => 'Nayifoğulları İnşaat / Karaçavuş Proje Geliştirme',
            'intro'       => 'Konut, sanayi yapıları ve ticari binalar dahil her ölçekteki üstyapı projesini anahtar teslim sunuyoruz.',
            'description' => 'Nayifoğulları İnşaat ve Karaçavuş Proje Geliştirme iş birliğiyle hayata geçirilen üstyapı projelerimiz; konut siteleri, sanayi tesisleri, depolar ve ticari yapıları kapsamaktadır. Statik hesaptan beton uygulamasına, çatı sisteminden dış cephe işlerine kadar tüm inşaat süreçlerini tek çatı altında yönetiyoruz.',
            'features'    => [
                'Konut ve site inşaatı',
                'Sanayi yapıları ve depo inşaatı',
                'Ticari yapı ve plaza inşaatı',
                'Anahtar teslim proje yönetimi',
                'Beton, çelik ve prefabrik yapı',
                'Tadilat ve güçlendirme çalışmaları',
            ],
        ],
        'kontrollu-yikim' => [
            'slug'        => 'kontrollu-yikim',
            'title'       => 'Kontrollü Yıkım',
            'icon'        => 'flaticon-015-cart',
            'image'       => 'real-project-09',
            'sector'      => 'Yıkım · Kentsel Dönüşüm · İSG',
            'company'     => 'Nayifoğulları YMK Yıkım Adi Ortaklığı',
            'intro'       => 'Lisanslı yıkım ekipleriyle bina ve tesis yıkımını güvenli, hızlı ve çevreye duyarlı biçimde gerçekleştiriyoruz.',
            'description' => 'Nayifoğulları YMK Yıkım Adi Ortaklığı bünyesinde yürütülen kontrollü yıkım hizmetlerimiz; mekanik yıkım, patlayıcılı yıkım ve endüstriyel tesis sökümünü kapsamaktadır. Kentsel dönüşüm projelerinde risk tespitinden yıkım planlamasına, atık ayrıştırmasından moloz nakliyesine kadar tüm süreç İSG standartlarında yönetilmektedir.',
            'features'    => [
                'Mekanik ve patlayıcılı bina yıkımı',
                'Kentsel dönüşüm yıkım projeleri',
                'Endüstriyel tesis ve fabrika sökümü',
                'Yıkım atığı ayrıştırma ve geri kazanım',
                'Moloz kaldırma ve saha temizliği',
                'İSG planlaması ve denetimi',
            ],
        ],
        'arazi-duzenleme' => [
            'slug'        => 'arazi-duzenleme',
            'title'       => 'Arazi Düzenleme',
            'icon'        => 'flaticon-048-chemical',
            'image'       => 'real-project-31',
            'sector'      => 'Zemin · Dolgu · Tesviye',
            'company'     => 'Karaçavuş Proje Geliştirme / Asel İnşaat Hafriyat',
            'intro'       => 'Proje alanlarının zemin tesviyesi, dolgu, kompaksiyon ve zemin iyileştirme işlemlerini hassasiyetle yapıyoruz.',
            'description' => 'İnşaata hazır arazi oluşturmak için gerçekleştirdiğimiz arazi düzenleme hizmetlerimiz; toprak dolgusu, kompaksiyon, zemin stabilizasyonu ve tesviye çalışmalarını kapsamaktadır. Sert ve bataklık zeminlerde zemin iyileştirme yöntemlerini uygulayan ekibimiz, proje alanını belirlenen kot ve eğimlere getirerek inşaat süreçlerini güvence altına alır.',
            'features'    => [
                'Toprak dolgusu ve kompaksiyon',
                'Zemin stabilizasyonu ve iyileştirme',
                'Kot ve eğim tesviyesi',
                'Drenaj ve yüzey suyu yönetimi',
                'Bitki örtüsü temizleme ve sıyırma',
                'Arazi sınırlama ve şev stabilizasyonu',
            ],
        ],
        'proje-gelistirme' => [
            'slug'        => 'proje-gelistirme',
            'title'       => 'Proje Geliştirme',
            'icon'        => 'flaticon-020-planning',
            'image'       => 'real-project-44',
            'sector'      => 'Planlama · Fizibilite · Yönetim',
            'company'     => 'Karaçavuş Proje Geliştirme',
            'intro'       => 'Fizibilite analizinden ihale süreçlerine, proje tasarımından inşaat yönetimine kadar kapsamlı destek.',
            'description' => 'Karaçavuş Proje Geliştirme bünyesinde sunduğumuz proje geliştirme hizmetleri; arsa değerlendirmesi ve fizibilite analizinden başlayarak mimari ve mühendislik koordinasyonu, ihale süreçleri yönetimi ve inşaat denetimini kapsamaktadır. Yatırımcı, müteahhit ve kamu kurumlarına tek elden danışmanlık ve yüklenicilik desteği sağlıyoruz.',
            'features'    => [
                'Arsa değerlendirme ve fizibilite',
                'Mimari ve mühendislik koordinasyonu',
                'Kamu ve özel ihale süreçleri',
                'İnşaat yönetimi ve hakediş takibi',
                'Ruhsat ve izin süreçleri danışmanlığı',
                'Yatırımcı temsil ve proje kontrol',
            ],
        ],
        'arac-ve-is-makinesi-ticareti' => [
            'slug'        => 'arac-ve-is-makinesi-ticareti',
            'title'       => 'Araç ve İş Makinesi Ticareti',
            'icon'        => 'flaticon-008-machine-1',
            'image'       => 'real-project-omkar',
            'image_ext'   => 'jpg',
            'sector'      => 'Otomotiv · Ticari Araç · Galeri',
            'company'     => 'Ömkar Otomotiv',
            'intro'       => 'Binek araç, hafriyat kamyonu ve iş makinesi alım satımında güvenilir galeri hizmeti sunuyoruz.',
            'description' => 'Ömkar Otomotiv bünyesinde sunduğumuz araç ticareti hizmetleri; binek otomobil, kamyon, damperli araç ve iş makinesi (ekskavatör, yükleyici, dozer) alım satımını kapsamaktadır. Sahibinden.com üzerinden aktif ilan yönetimiyle hem bireysel hem kurumsal alıcılara ulaşıyor; kurumsal filo yenileme ve ikinci el araç değerleme konularında da danışmanlık sağlıyoruz.',
            'features'    => [
                'Binek otomobil alım ve satımı',
                'Hafriyat kamyonu ve damperli araç',
                'Ekskavatör, yükleyici ve dozer ticareti',
                'Kurumsal filo yenileme danışmanlığı',
                'İkinci el araç değerleme ve ekspertiz',
                'Sahibinden.com aktif ilan yönetimi',
            ],
        ],
        'isg-ve-teknik-danismanlik' => [
            'slug'        => 'isg-ve-teknik-danismanlik',
            'title'       => 'İSG ve Teknik Danışmanlık',
            'icon'        => 'flaticon-037-forklift',
            'image'       => 'service-6-m',
            'image_path'  => 'assets/img/service/service-6-m.webp',
            'sector'      => 'İSG · Denetim · Danışmanlık',
            'company'     => 'Karaçavuş Şirketler Grubu',
            'intro'       => 'Tüm projelerimizde İSG sertifikalı uzmanlarımızla iş güvenliği planlaması ve teknik denetim hizmeti.',
            'description' => 'Karaçavuş Şirketler Grubu bünyesindeki tüm şantiye ve operasyonlarda İSG standartları eksiksiz uygulanmaktadır. İSG uzmanı kadromuz; risk değerlendirmesi, güvenlik planı hazırlama, çalışan eğitimi ve periyodik denetim hizmetleri sunmaktadır. Grup dışındaki projelere de teknik danışmanlık ve İSG denetimi yapılmaktadır.',
            'features'    => [
                'Sahada İSG risk değerlendirmesi',
                'Güvenlik planı ve acil eylem prosedürleri',
                'Çalışan İSG eğitimi ve bilinçlendirme',
                'Periyodik saha denetimi ve raporlama',
                'Ekipman ve makine güvenlik kontrolü',
                'Kamu denetimlerine hazırlık desteği',
            ],
        ],
    ];

    abort_if(!isset($services[$slug]), 404);
    return view('frontend.service-detail', ['service' => $services[$slug]]);
})->name('service.show');

Route::get('/sirketlerimiz/{slug}', function (string $slug) {
    $companies = [
        'karacavus-proje-gelistirme' => [
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
            'address'     => 'Soğanlık Yeni Mah. Pega Gaz Sk. Aura Residence No:4/A K.47 Kartal / İstanbul',
            'map_query'   => 'Aura+Residence+Soğanlık+Yeni+Mah+Pegagaz+Sokak+Kartal+Istanbul',
            'vision'      => '2001\'den bu yana 850\'yi aşkın proje, 420 memnun müşteri ve 24 yıllık sektör deneyimiyle Türkiye\'nin güvenilir inşaat grubu olmaya devam ediyoruz.',
        ],
        'asel-insaat-hafriyat' => [
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
            'address'     => 'Soğanlık Yeni Mah. Pega Gaz Sk. Aura Residence No:4/A K.48 Kartal / İstanbul',
            'map_query'   => 'Aura+Residence+Soğanlık+Yeni+Mah+Pegagaz+Sokak+Kartal+Istanbul',
            'vision'      => 'Altyapı ve otomotiv sektörlerinde entegre hizmet anlayışıyla Türkiye\'nin dört bir yanında güvenilir çözümler sunuyoruz.',
        ],
        'omkar-insaat-hafriyat' => [
            'slug'        => 'omkar-insaat-hafriyat',
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
        ],
        'nayifogullari-insaat' => [
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
            'vision'      => 'Güvenilirlik ve hız ilkeleriyle her projede katma değer yaratıyoruz.',
        ],
        'nayifogullari-ymk-yikim' => [
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
            'vision'      => 'Güvenli ve çevre dostu yıkım uygulamalarıyla kentsel dönüşümün güvenilir ortağıyız.',
        ],
    ];

    abort_if(!isset($companies[$slug]), 404);
    return view('frontend.company-detail', ['company' => $companies[$slug]]);
})->name('company.show');

// ─── Admin Panel ─────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', fn() => redirect()->route('admin.posts.index'));

    // Blog
    Route::resource('posts', Admin\PostController::class)->except('show');
    Route::resource('blog-categories', Admin\BlogCategoryController::class)->except('show');

    // Hizmetler
    Route::resource('services', Admin\ServiceController::class)->except('show');

    // Projeler
    Route::resource('projects', Admin\ProjectController::class)->except('show');

    // Ayarlar
    Route::get('settings', [Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [Admin\SettingController::class, 'update'])->name('settings.update');
});

// ─── Breeze Profile ──────────────────────────────────────────────────────────
Route::get('/dashboard', fn() => redirect()->route('admin.posts.index'))
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
