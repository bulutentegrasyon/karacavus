@extends('layouts.frontend')

@section('title', 'Karaçavuş Şirketler Grubu | Hafriyat, İnşaat ve Proje Geliştirme')

@section('css')
<style>
/* Team section — 3 eşit blok, hizalı */
.team-slider-column-wrapper {
    position: static !important;
    max-width: 100% !important;
}
.team-area .row {
    align-items: stretch;
}
.team-area .col-lg-4 {
    display: flex;
    align-items: center;
}
/* Slider yerine 3 eşit grid */
.team-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    align-items: stretch;
}
.team-grid-item {
    overflow: hidden;
    border-radius: 2px;
}
.team-grid-item img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    object-position: top center;
    display: block;
}
@media (max-width: 767px) {
    .team-grid { grid-template-columns: repeat(3, 1fr); gap: 8px; }
    .team-grid-item img { height: 160px; }
}
/* Service area — banner görseli taşmasın */
.service-area {
    overflow: hidden;
    padding-top: 60px;
}
.service-banner > img {
    max-height: 420px;
    width: auto;
    object-fit: contain;
}
</style>
@stop

@section('content')
    <!--====================  hero slider area ====================-->
    <div class="hero-slider-area space__bottom--r120">
        <div class="hero-slick-slider-wrapper">
            <div class="single-hero-slider single-hero-slider--background single-hero-slider--overlay position-relative bg-img" data-bg="{{ asset('assets/img/hero-slider/hero-slider-1.webp') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- hero slider content -->
                            <div class="hero-slider-content hero-slider-content--extra-space">
                                <h3 class="hero-slider-content__subtitle">Karaçavuş Şirketler Grubu</h3>
                                <h2 class="hero-slider-content__title space__bottom--50">İnşaat, Otomotiv, Hafriyat,<br>Altyapı ve Taahhüt
                                </h2>
                                <a href="/iletisim" class="default-btn default-btn--hero-slider">Bize Ulaşın</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider single-hero-slider--background single-hero-slider--overlay position-relative bg-img" data-bg="{{ asset('assets/img/hero-slider/hero-slider-2.webp') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- hero slider content -->
                            <div class="hero-slider-content hero-slider-content--extra-space">
                                <h3 class="hero-slider-content__subtitle">2001'den Bu Yana</h3>
                                <h2 class="hero-slider-content__title space__bottom--50">Hafriyat, İnşaat ve Altyapıda 25 Yıllık Deneyim
                                </h2>
                                <a href="/hizmetler" class="default-btn default-btn--hero-slider">Hizmetlerimiz</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of hero slider area  ====================-->
    <!--====================  brand logo area ====================-->
    <div class="brand-logo-area space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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
    <!--====================  about area ====================-->
    <div class="about-area space__bottom--r120 ">
        <div class="container">
            <div class="row align-items-center row-25">
                <div class="col-md-6">
                    <div class="about-image space__bottom__lm--30">
                        <img width="521" height="498" src="{{ asset('assets/img/about/about-section-1-blue.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-content">
                        <!-- section title -->
                        <div class="section-title space__bottom--25">
                            <h3 class="section-title__sub">2001'den Beri</h3>
                            <h2 class="section-title__title">Türkiye'nin Köklü Şirketler Grubu</h2>
                        </div>
                        <p class="about-content__text space__bottom--40">Karaçavuş Şirketler Grubu, 2001 yılında hafriyat sektöründe faaliyete başlayarak bugün 5 bağlı şirket ve 3 ana sektörde (hafriyat, inşaat, otomotiv) hizmet sunan köklü bir yapıya ulaşmıştır. Güven, emek ve süreklilik ilkeleriyle kurulmuş bu grup; her ölçekteki projeyi uzman kadrosu ve modern ekipmanlarıyla başarıyla tamamlamaktadır.</p>
                        <a href="/hakkimizda" class="default-btn">Daha Fazla Bilgi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of about area  ====================-->
    <!--====================  feature area ====================-->
    <div class="feature-area space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <!-- feature content wrapper -->
                    <div class="feature-content-wrapper space__bottom--m35">
                        <div class="single-feature space__bottom--35">
                            <div class="single-feature__icon">
                                <img width="53" height="53" src="{{ asset('assets/img/icons/feature-1.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="single-feature__content">
                                <h4 class="single-feature__title">İSG Sertifikalı</h4>
                                <p class="single-feature__text">Tüm projelerimizde iş sağlığı ve güvenliği standartları eksiksiz uygulanır.</p>
                            </div>
                        </div>
                        <div class="single-feature space__bottom--35">
                            <div class="single-feature__icon">
                                <img width="53" height="53" src="{{ asset('assets/img/icons/feature-2.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="single-feature__content">
                                <h4 class="single-feature__title">Zamanında Teslimat</h4>
                                <p class="single-feature__text">Proje takvimlerine tam uyum ile işlerinizi aksatmadan teslim ediyoruz.</p>
                            </div>
                        </div>
                        <div class="single-feature space__bottom--35">
                            <div class="single-feature__icon">
                                <img width="53" height="53" src="{{ asset('assets/img/icons/feature-3.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="single-feature__content">
                                <h4 class="single-feature__title">Modern Ekipman</h4>
                                <p class="single-feature__text">Son teknoloji iş makineleri ile verimli ve hızlı sonuçlar üretiyoruz.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 space__bottom__md--40 space__bottom__lm--40 order-1 order-lg-2">
                    <!-- feature content image -->
                    <div class="feature-content-image">
                        <img width="338" height="367" src="{{ asset('assets/img/feature/feature-banner-1.webp') }}" class="img-fluid" alt="">
                        <img width="301" height="372" src="{{ asset('assets/img/feature/feature-banner-2.webp') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of feature area  ====================-->
    <!--====================  service area ====================-->
    <div class="service-area">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                    <!-- service banner -->
                    <div class="service-banner">
                        <img width="328" height="497" src="{{ asset('assets/img/service/service-man.webp') }}" class="float-none float-lg-end" alt="" />
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 mt-0 mt-lg-4">
                    <!-- section title -->
                    <div class="section-title space__bottom--40">
                        <h3 class="section-title__sub">Hizmetlerimiz</h3>
                        <h2 class="section-title__title">Kapsamlı Hafriyat ve İnşaat Çözümleri</h2>
                    </div>
                </div>
            </div>
            <!-- service slider — full width so 3 slides fit cleanly -->
            <div class="row">
                <div class="col-12" style="overflow:hidden;">
                    <div class="service-slider-wrapper space__bottom__md--40 space__bottom__lm--40">
                        @forelse($services as $service)
                        <div class="single-service text-center">
                            <div class="single-service__image space__bottom--15">
                                <a href="/hizmetler/{{ $service->slug }}">
                                    <img width="270" height="194"
                                         src="{{ $service->image_url }}"
                                         class="img-fluid" alt="{{ $service->title }}" />
                                </a>
                            </div>
                            <h4 class="single-service__content">
                                <a href="/hizmetler/{{ $service->slug }}">{{ $service->title }}</a>
                            </h4>
                        </div>
                        @empty
                        <div class="single-service text-center">
                            <div class="single-service__image space__bottom--15">
                                <a href="/hizmetler"><img width="270" height="194" src="{{ asset('assets/img/service/service-1.webp') }}" class="img-fluid" alt="Hizmetlerimiz" /></a>
                            </div>
                            <h4 class="single-service__content"><a href="/hizmetler">Hizmetlerimiz</a></h4>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of service area  ====================-->
    <!--====================  fun fact area ====================-->
    <div class="fun-fact-area space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- fun fact wrapper -->
                    <div class="fun-fact-wrapper fun-fact-wrapper-bg bg-img" data-bg="{{ asset('assets/img/backgrounds/funfact-bg.webp') }}">
                        <div class="fun-fact-inner background-color--default-overlay background-repeat--x-bottom space__inner--y30 bg-img" data-bg="{{ asset('assets/img/icons/ruler-black.webp') }}">
                            <div class="fun-fact-content-wrapper">
                                <div class="single-fun-fact">
                                    <h3 class="single-fun-fact__number counter">850</h3>
                                    <h4 class="single-fun-fact__text">Tamamlanan Proje</h4>
                                </div>
                                <div class="single-fun-fact">
                                    <h3 class="single-fun-fact__number counter">420</h3>
                                    <h4 class="single-fun-fact__text">Mutlu Müşteri</h4>
                                </div>
                                <div class="single-fun-fact">
                                    <h3 class="single-fun-fact__number counter">25</h3>
                                    <h4 class="single-fun-fact__text">Yıllık Deneyim</h4>
                                </div>
                                <div class="single-fun-fact">
                                    <h3 class="single-fun-fact__number counter">85</h3>
                                    <h4 class="single-fun-fact__text">Uzman Personel</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of fun fact area  ====================-->
    <!--====================  project area ====================-->
    <div class="project-area space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title text-center  space__bottom--40 mx-auto">
                        <h3 class="section-title__sub">Son Projelerimiz</h3>
                        <h2 class="section-title__title">Tamamladığımız Öne Çıkan Projeler</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-wrapper space__bottom--m5" id="project-justify-wrapper" style="max-width: 1200px; margin: 0 auto;">
            @foreach($featuredProjects as $p)
            <div class="single-project-wrapper">
                <a class="single-project-item" href="{{ route('project.show', $p->slug) }}">
                    <img width="440" height="360" src="{{ $p->image_url }}" class="img-fluid" alt="{{ $p->title }}">
                    <span class="single-project-title">{{ $p->title }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <!--====================  End of project area  ====================-->
    <!--====================  team area ====================-->
    <div class="team-area space__bottom--r120 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 space__bottom__md--40 space__bottom__lm--40">
                    <div class="team-member-title-wrapper">
                        <!-- section title -->
                        <div class="section-title space__bottom--30 space__bottom__md--30 space__bottom__lm--20">
                            <h3 class="section-title__sub">Uzman Kadromuz</h3>
                            <h2 class="section-title__title">Deneyimli Profesyonel Ekibimiz</h2>
                        </div>
                        <p class="team-text space__bottom--40 space__bottom__md--30 space__bottom__lm--20">Karaçavuş Şirketler Grubu bünyesindeki uzman mühendis ve teknik kadromuz, grup şirketleri genelinde her projede en yüksek kaliteyi güvence altına alır.</p>
                        <a href="/hakkimizda" class="default-btn">Daha Fazla</a>
                    </div>
                </div>
                <div class="col-lg-8 team-slider-column-wrapper">
                    <div class="team-grid">
                        <div class="team-grid-item">
                            <img src="{{ asset('assets/img/team/team-member1.webp') }}" alt="">
                        </div>
                        <div class="team-grid-item">
                            <img src="{{ asset('assets/img/team/team-member2.webp') }}" alt="">
                        </div>
                        <div class="team-grid-item">
                            <img src="{{ asset('assets/img/team/team-member3.webp') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of team area  ====================-->
    <!--====================  testimonial cta area ====================-->
    <div class="testimonial-cta-area space__bottom--r120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 space__bottom__md--40 space__bottom__lm--40">
                    <!-- cta block -->
                    <div class="cta-block cta-block--shadow cta-block--bg bg-img" data-bg="{{ asset('assets/img/backgrounds/cta-bg.webp') }}">
                        <div class="cta-block__inner background-color--default-light-overlay space__inner--ry100">
                            <p class="cta-block__light-text text-center">Projeniz İçin</p>
                            <p class="cta-block__semi-bold-text text-center">Ücretsiz Keşif İsteyin <br> Uzman ekibimiz sizinle iletişime geçecektir.
                        </p>
                                <p class="cta-block__bold-text text-center">+90 539 730 50 65</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <!-- section title -->
                    <div class="section-title text-center  space__bottom--40 mx-auto">
                        <h3 class="section-title__sub">Müşteri Yorumları</h3>
                        <h2 class="section-title__title">Müşterilerimiz Ne Diyor?</h2>
                    </div>
                    <!-- testimonial slider -->
                    <div class="testimonial-slider-wrapper space__inner__bottom__md--30  space__inner__bottom__lm--30">
                        @forelse($testimonials as $t)
                        <div class="single-testimonial text-center">
                            <p class="single-testimonial__text space__bottom--40">
                                <span class="quote-left">"</span>{{ $t->content }}<span class="quote-right">"</span>
                            </p>
                            <div class="single-testimonial__rating space__bottom--10">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star{{ $i <= $t->rating ? '' : '-o' }}"></i>
                                @endfor
                            </div>
                            <h5 class="single-testimonial__author">{{ $t->author_name }}</h5>
                            <p class="single-testimonial__author-des">{{ $t->author_company }}</p>
                        </div>
                        @empty
                        <div class="single-testimonial text-center">
                            <p class="single-testimonial__text space__bottom--40">
                                <span class="quote-left">"</span>Karaçavuş Şirketler Grubu ile çalışmak büyük bir memnuniyet.<span class="quote-right">"</span>
                            </p>
                            <div class="single-testimonial__rating space__bottom--10">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of testimonial cta area  ====================-->
    <!--====================  blog grid slider area ====================-->
    <div class="blog-grid-slider-area space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title text-center  space__bottom--40 mx-auto">
                        <h3 class="section-title__sub">Blog & Haberler</h3>
                        <h2 class="section-title__title">Sektörden Güncel Haberler</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-grid-wrapper space__bottom--m40">
                        <div class="row">
                            @forelse($latestPosts as $post)
                            <div class="col-md-4">
                                <div class="single-blog-grid space__bottom--40">
                                    <div class="single-blog-grid__image space__bottom--15">
                                        <a href="/blog/{{ $post->slug }}">
                                            <img width="370" height="271"
                                                 src="{{ $post->image_url }}"
                                                 class="img-fluid" alt="{{ $post->title }}">
                                        </a>
                                    </div>
                                    <h4 class="single-blog-grid__title space__bottom--10">
                                        <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                                    </h4>
                                    <p class="single-blog-grid__text">
                                        {{ $post->category->name ?? 'Genel' }} / {{ $post->published_at->locale('tr')->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-4">
                                <p style="color:#999;">Henüz blog yazısı yayınlanmamış.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of blog grid slider area  ====================-->
@endsection
