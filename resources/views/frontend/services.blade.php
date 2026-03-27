@extends('layouts.frontend')

@section('title', 'Hizmetlerimiz | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>Hizmetlerimiz</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li>Hizmetlerimiz</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->

    <style>
        .service-grid-item__image-wrapper { height: 220px; overflow: hidden; }
        .service-grid-item__image-wrapper img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .service-grid-item__content { display: flex; flex-direction: column; min-height: 160px; }
        .service-grid-item__content .subtitle { flex: 1; }
    </style>

    @php
    $items = [
        ['slug'=>'hafriyat-ve-temel-kazi',      'title'=>'Hafriyat ve Temel Kazı',        'icon'=>'flaticon-002-welding',    'image'=>'real-project-01', 'alt'=>'Hafriyat ve Temel Kazı',       'subtitle'=>'GPS destekli iş makineleriyle konut, sanayi ve altyapı projelerine yönelik her ölçekte hassas toprak kazısı ve hafriyat çalışması.'],
        ['slug'=>'toprak-tasima-ve-nakliye',     'title'=>'Toprak Taşıma ve Nakliye',      'icon'=>'flaticon-006-truck',      'image'=>'real-project-02', 'alt'=>'Toprak Taşıma ve Nakliye',     'subtitle'=>'Geniş kamyon ve damperli araç filomuzla hafriyat toprağı, moloz ve inşaat malzemesini hızlı, güvenli ve ekonomik biçimde taşıyoruz.'],
        ['slug'=>'altyapi-insaati',              'title'=>'Altyapı İnşaatı',               'icon'=>'flaticon-010-tank-1',     'image'=>'real-project-24', 'alt'=>'Altyapı İnşaatı',              'subtitle'=>'Karayolu, köprü, su, kanalizasyon ve doğalgaz altyapısı tesis çalışmalarında deneyimli mühendis kadromuzla hizmetinizdeyiz.'],
        ['slug'=>'ustyapi-ve-yapi-insaati',      'title'=>'Üstyapı ve Yapı İnşaatı',       'icon'=>'flaticon-004-walkie-talkie','image'=>'real-project-41','alt'=>'Üstyapı ve Yapı İnşaatı',    'subtitle'=>'Konut, sanayi yapıları, depolar ve ticari binalar dahil her ölçekteki üstyapı projelerini anahtar teslim olarak gerçekleştiriyoruz.'],
        ['slug'=>'kontrollu-yikim',              'title'=>'Kontrollü Yıkım',               'icon'=>'flaticon-015-cart',       'image'=>'real-project-09', 'alt'=>'Kontrollü Yıkım',              'subtitle'=>'Lisanslı yıkım ekipleri ve İSG odaklı çalışma anlayışıyla bina, tesis ve endüstriyel yapıları güvenli ve çevreye duyarlı biçimde yıkıyoruz.'],
        ['slug'=>'arazi-duzenleme',              'title'=>'Arazi Düzenleme',               'icon'=>'flaticon-048-chemical',   'image'=>'real-project-31', 'alt'=>'Arazi Düzenleme',              'subtitle'=>'Proje alanlarının zemin tesviyesi, dolgu, kompaksiyon ve zemin iyileştirme işlemlerini modern ekipmanlarla hassasiyetle gerçekleştiriyoruz.'],
        ['slug'=>'proje-gelistirme',             'title'=>'Proje Geliştirme',              'icon'=>'flaticon-020-planning',   'image'=>'real-project-44', 'alt'=>'Proje Geliştirme',             'subtitle'=>'Fizibilite analizinden ihale süreçlerine, proje tasarımından inşaat yönetimine kadar tüm geliştirme süreçlerinde danışmanlık ve yüklenicilik.'],
        ['slug'=>'arac-ve-is-makinesi-ticareti', 'title'=>'Araç ve İş Makinesi Ticareti', 'icon'=>'flaticon-008-machine-1',  'image'=>'real-project-omkar', 'ext'=>'jpg', 'alt'=>'Araç ve İş Makinesi Ticareti', 'subtitle'=>'Binek araç, hafriyat kamyonu ve iş makinesi alım satımı. Kurumsal filo yenileme, ikinci el araç değerleme ve ekspertiz hizmetleri sunuyoruz.'],
        ['slug'=>'isg-ve-teknik-danismanlik',    'title'=>'İSG ve Teknik Danışmanlık',     'icon'=>'flaticon-037-forklift',   'image'=>'service-6-m', 'path'=>'assets/img/service/service-6-m.webp', 'alt'=>'İSG ve Teknik Danışmanlık',    'subtitle'=>'İSG sertifikalı uzman kadromuzla tüm projelerimizde iş sağlığı ve güvenliği planlaması, denetimi ve teknik danışmanlık hizmetleri sunuyoruz.'],
    ];
    @endphp

    <div class="service-section space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center space__bottom--40 mx-auto">
                        <h3 class="section-title__sub">Ne Yapıyoruz?</h3>
                        <h2 class="section-title__title">Karaçavuş Şirketler Grubu Hizmetleri</h2>
                    </div>
                    <div class="service-item-wrapper space__bottom--m40">
                        <div class="row">
                            @foreach($items as $item)
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="service-grid-item">
                                    <div class="service-grid-item__image">
                                        <div class="service-grid-item__image-wrapper">
                                            <a href="/hizmetler/{{ $item['slug'] }}">
                                                <img src="{{ asset($item['path'] ?? 'assets/img/projects/' . $item['image'] . '.' . ($item['ext'] ?? 'webp')) }}" class="img-fluid" alt="{{ $item['alt'] }}">
                                            </a>
                                        </div>
                                        <div class="icon"><i class="{{ $item['icon'] }}"></i></div>
                                    </div>
                                    <div class="service-grid-item__content">
                                        <h3 class="title"><a href="/hizmetler/{{ $item['slug'] }}">{{ $item['title'] }}</a></h3>
                                        <p class="subtitle">{{ $item['subtitle'] }}</p>
                                        <a href="/hizmetler/{{ $item['slug'] }}" class="see-more-link">DEVAMINI OKU</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  brand logo area ====================-->
    <div class="brand-logo-area space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- brand logo slider -->
                    <div class="brand-logo-wrapper">
                        <div class="single-brand-logo">
                            <a href="/sirketlerimiz" class="brand-item">
                                <i class="flaticon-020-planning"></i>
                                <span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Karaçavuş<br>Proje Geliştirme</span>
                            </a>
                        </div>
                        <div class="single-brand-logo">
                            <a href="/sirketlerimiz" class="brand-item">
                                <i class="flaticon-008-machine-1"></i>
                                <span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Asel<br>İnşaat Hafriyat</span>
                            </a>
                        </div>
                        <div class="single-brand-logo">
                            <a href="/sirketlerimiz" class="brand-item">
                                <i class="flaticon-006-truck"></i>
                                <span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Ömkar<br>Otomotiv</span>
                            </a>
                        </div>
                        <div class="single-brand-logo">
                            <a href="/sirketlerimiz" class="brand-item">
                                <i class="flaticon-037-forklift"></i>
                                <span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Nayifoğulları<br>İnşaat</span>
                            </a>
                        </div>
                        <div class="single-brand-logo">
                            <a href="/sirketlerimiz" class="brand-item">
                                <i class="flaticon-016-gear"></i>
                                <span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Nayifoğulları<br>YMK Yıkım</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of brand logo area  ====================-->
@endsection
