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
        .service-grid-item__image-wrapper { position: relative !important; overflow: hidden !important; padding-top: 100% !important; }
        .service-grid-item__image-wrapper a { position: absolute !important; inset: 0 !important; display: block !important; }
        .service-grid-item__image-wrapper a img { width: 100% !important; height: 100% !important; object-fit: cover !important; display: block !important; }
        .service-grid-item__content { display: flex; flex-direction: column; min-height: 160px; }
        .service-grid-item__content .subtitle { flex: 1; }
    </style>

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
                            @foreach($services as $item)
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="service-grid-item">
                                    <div class="service-grid-item__image">
                                        <div class="service-grid-item__image-wrapper">
                                            <a href="{{ route('service.show', $item->slug) }}">
                                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                                            </a>
                                        </div>
                                        <div class="icon"><i class="{{ $item->icon }}"></i></div>
                                    </div>
                                    <div class="service-grid-item__content">
                                        <h3 class="title"><a href="{{ route('service.show', $item->slug) }}">{{ $item->title }}</a></h3>
                                        <p class="subtitle">{{ $item->excerpt }}</p>
                                        <a href="{{ route('service.show', $item->slug) }}" class="see-more-link">DEVAMINI OKU</a>
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
    <div class="brand-logo-area space__top--r120 space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-logo-wrapper">
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-020-planning"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Karaçavuş<br>Proje Geliştirme</span></a></div>
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-008-machine-1"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Asel<br>İnşaat Hafriyat</span></a></div>
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-006-truck"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Ömkar<br>Otomotiv</span></a></div>
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-037-forklift"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Nayifoğulları<br>İnşaat</span></a></div>
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-016-gear"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Nayifoğulları<br>YMK Yıkım</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
