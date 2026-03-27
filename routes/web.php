<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;
use App\Models\Post;
use App\Models\Reference;
use App\Models\Service;
use App\Models\BlogCategory;
use App\Models\Company;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

// ─── Ön Yüz ─────────────────────────────────────────────────────────────────
Route::get('/', function () {
    $services      = Service::active()->take(9)->get();
    $latestPosts   = Post::active()->with('category')->latest('published_at')->take(3)->get();
    $testimonials  = Testimonial::active()->orderBy('order')->get();
    return view('frontend.home', compact('services', 'latestPosts', 'testimonials'));
});
Route::get('/hakkimizda', fn() => view('frontend.about'));
Route::get('/hizmetler', fn() => view('frontend.services'));
Route::get('/referanslar', function () {
    $references = Reference::active()->orderBy('order')->get();
    return view('frontend.references', compact('references'));
});
Route::get('/referanslar/{slug}', function ($slug) {
    $reference = Reference::active()->where('slug', $slug)->firstOrFail();
    $others    = Reference::active()->where('id', '!=', $reference->id)->inRandomOrder()->take(8)->get();
    return view('frontend.reference-detail', compact('reference', 'others'));
});
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
    $co = Company::active()->where('slug', $slug)->firstOrFail();
    $references = Reference::active()->where('company', $co->short)->orderBy('order')->get();
    return view('frontend.company-detail', ['company' => $co, 'references' => $references]);
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

    // Referanslar
    Route::resource('references', Admin\ReferenceController::class)->except('show');

    // Müşteri Yorumları
    Route::resource('testimonials', Admin\TestimonialController::class)->except('show');

    // Şirketler
    Route::resource('companies', Admin\CompanyController::class)->only(['index', 'edit', 'update']);

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
