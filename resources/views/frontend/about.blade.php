@extends('layouts.frontend')

@section('title', 'Hakkımızda | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>Hakkımızda</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li>Hakkımızda</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->
    <!--====================  about area ====================-->
    <div class="about-area space__bottom--r120 ">
        <div class="container">
            <div class="row align-items-center row-25">
                <div class="col-md-6 order-2 order-md-1">
                    <div class="about-content">
                        <!-- section title -->
                        <div class="section-title space__bottom--25">
                            <h3 class="section-title__sub">2001'den Beri</h3>
                            <h2 class="section-title__title">Güven, Emek ve Süreklilik Üzerine Kurulu Şirketler Grubu</h2>
                        </div>
                        <p class="about-content__text space__bottom--40">Şirketler Grubumuz, 2001 yılında kökleri aile değerlerine dayanan kurucu ortaklarımız tarafından temelleri atılmış, güven, emek ve süreklilik ilkeleri üzerine kurulmuş köklü bir yapıdır. İlk faaliyet alanımız olan hafriyat sektörü, grubumuzun saha tecrübesinin ve iş disiplininin temelini oluşturmuştur. Zaman içinde edindiğimiz deneyimi ve kurumsal vizyonumuzu farklı sektörlere taşıyarak; 2021 yılında otomotiv, 2025 yılında ise inşaat sektörlerinde faaliyet göstermeye başladık.</p>
                        <a href="/projeler" class="default-btn">Projelerimizi İnceleyin</a>
                    </div>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <div class="about-image space__bottom__lm--30">
                        <img width="671" height="408" src="{{ asset('assets/img/about/about-section-2.webp') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of about area  ====================-->

    <!--====================  sektörler area ====================-->
    <div class="feature-area space__bottom--r120" style="background:#f9f9f9; padding:80px 0; color:#1a1a1a;">
        <div class="container">
            <div class="section-title text-center space__bottom--40 mx-auto">
                <h3 class="section-title__sub">Faaliyet Alanlarımız</h3>
                <h2 class="section-title__title">Sektörlerimiz</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="single-feature-item" style="background:#fff;padding:30px;border-left:4px solid #1B3A6B;box-shadow:0 2px 15px rgba(0,0,0,.07);">
                        <div class="single-feature-item__icon mb-3">
                            <i class="flaticon-008-machine-1" style="font-size:40px;color:#1B3A6B;"></i>
                        </div>
                        <h4 class="single-feature-item__title" style="font-size:20px;font-weight:700;">Hafriyat <small style="font-size:13px;color:#999;font-weight:400;">2001'den beri</small></h4>
                        <p style="color:#666;font-size:14px;line-height:1.8;">2001 yılından bu yana sürdürdüğümüz hafriyat faaliyetlerimiz; güçlü makine parkuru, deneyimli ekip ve güvenli saha yönetimi anlayışıyla yürütülmektedir. Altyapı, üstyapı ve büyük ölçekli projelerde sağlam zemin, doğru planlama ve zamanında teslim prensipleriyle hizmet vermekteyiz.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="single-feature-item" style="background:#fff;padding:30px;border-left:4px solid #1B3A6B;box-shadow:0 2px 15px rgba(0,0,0,.07);">
                        <div class="single-feature-item__icon mb-3">
                            <i class="flaticon-006-truck" style="font-size:40px;color:#1B3A6B;"></i>
                        </div>
                        <h4 class="single-feature-item__title" style="font-size:20px;font-weight:700;">Otomotiv <small style="font-size:13px;color:#999;font-weight:400;">2021'den beri</small></h4>
                        <p style="color:#666;font-size:14px;line-height:1.8;">2021 yılında bünyemize kattığımız otomotiv faaliyetlerimizde; kalite, güvenilirlik ve müşteri memnuniyetini esas alan bir hizmet anlayışı benimsemekteyiz. Sektördeki teknolojik gelişmeleri yakından takip ederek sürdürülebilir ve yenilikçi çözümler sunmayı hedefliyoruz.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="single-feature-item" style="background:#fff;padding:30px;border-left:4px solid #1B3A6B;box-shadow:0 2px 15px rgba(0,0,0,.07);">
                        <div class="single-feature-item__icon mb-3">
                            <i class="flaticon-020-planning" style="font-size:40px;color:#1B3A6B;"></i>
                        </div>
                        <h4 class="single-feature-item__title" style="font-size:20px;font-weight:700;">İnşaat <small style="font-size:13px;color:#999;font-weight:400;">2025'ten beri</small></h4>
                        <p style="color:#666;font-size:14px;line-height:1.8;">2025 yılında adım attığımız inşaat sektöründe; modern yaşam alanları, sağlam yapılar ve uzun ömürlü projeler üretmeyi amaçlıyoruz. Planlama aşamasından teslim sürecine kadar kalite standartlarını ön planda tutarak <strong>Mutluluğu İnşa ediyoruz.</strong></p>
                    </div>
                </div>
            </div>

            {{-- Vizyon & Değerler --}}
            <div class="row mt-5">
                <div class="col-lg-6 mb-4">
                    <h3 style="font-family:'Rajdhani',sans-serif;font-weight:700;font-size:26px;border-bottom:2px solid #1B3A6B;padding-bottom:10px;margin-bottom:20px;">Vizyonumuz</h3>
                    <p style="color:#555;line-height:1.9;">Şirketler grubu olarak vizyonumuz; faaliyet gösterdiğimiz tüm sektörlerde güvenilirliği ile tercih edilen, kalite standartlarını yükselten ve sürdürülebilir büyümeyi hedefleyen güçlü bir marka topluluğu olmaktır. Gelenekten gelen tecrübemizi yenilikçi bakış açısıyla birleştirerek, geleceğe değer katan projeler üretmeyi amaçlıyoruz.</p>
                </div>
                <div class="col-lg-6 mb-4">
                    <h3 style="font-family:'Rajdhani',sans-serif;font-weight:700;font-size:26px;border-bottom:2px solid #1B3A6B;padding-bottom:10px;margin-bottom:20px;">Değerlerimiz</h3>
                    <ul style="list-style:none;padding:0;color:#555;line-height:2.2;">
                        <li style="color:#555;"><i class="fa fa-check" style="color:#1B3A6B;margin-right:8px;"></i>Güven ve şeffaflık</li>
                        <li style="color:#555;"><i class="fa fa-check" style="color:#1B3A6B;margin-right:8px;"></i>Kalite ve süreklilik</li>
                        <li style="color:#555;"><i class="fa fa-check" style="color:#1B3A6B;margin-right:8px;"></i>Sorumluluk bilinci</li>
                        <li style="color:#555;"><i class="fa fa-check" style="color:#1B3A6B;margin-right:8px;"></i>Yenilikçi yaklaşım</li>
                        <li style="color:#555;"><i class="fa fa-check" style="color:#1B3A6B;margin-right:8px;"></i>Uzun vadeli iş ortaklıkları</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of sektörler area  ====================-->

    <!--====================  cta area ====================-->
    <div class="cta-area cta-area-bg bg-img" data-bg="{{ asset('assets/img/backgrounds/cta-bg2.webp') }}">
        <div class="cta-wrapper background-color--dark-overlay space__inner__top--50 space__inner__bottom--150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="cta-block">
                            <p class="cta-block__light-text text-center" style="color:#fff;">Projenizi Birlikte Hayata Geçirelim</p>
                            <p class="cta-block__semi-bold-text cta-block__semi-bold-text--medium text-center" style="color:#fff;">İhtiyacınıza özel çözümler için uzman ekibimizle hemen iletişime geçin.</p>
                            <p class="cta-block__bold-text text-center" style="color:#fff;">Teklif Alın</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of cta area  ====================-->
    <!-- funfact include -->
    <div class="funfact-wrapper space__top--m100">
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
                                        {{-- 2001'den bu yana --}}
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
    </div>
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
                                <h4 class="single-feature__title">Deneyimli Kadro</h4>
                                <p class="single-feature__text">26 yıllık sektör bilgisi ve uzman mühendis kadrosu ile her projeyi başarıyla yönetiyoruz.</p>
                            </div>
                        </div>
                        <div class="single-feature space__bottom--35">
                            <div class="single-feature__icon">
                                <img width="53" height="53" src="{{ asset('assets/img/icons/feature-2.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="single-feature__content">
                                <h4 class="single-feature__title">Güvenlik Önceliğimiz</h4>
                                <p class="single-feature__text">Tüm operasyonlarda sıfır iş kazası hedefi ile çalışan ve müşteri güvenliğini ön planda tutuyoruz.</p>
                            </div>
                        </div>
                        <div class="single-feature space__bottom--35">
                            <div class="single-feature__icon">
                                <img width="53" height="53" src="{{ asset('assets/img/icons/feature-3.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="single-feature__content">
                                <h4 class="single-feature__title">Çevre Dostu</h4>
                                <p class="single-feature__text">Sürdürülebilir hafriyat ve toprak yönetimi anlayışıyla çevreye duyarlı projeler yürütüyoruz.</p>
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
    <!--====================  team area ====================-->
    <div class="team-area space__bottom--r120 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 space__bottom__md--40 space__bottom__lm--40">
                    <div class="team-member-title-wrapper">
                        <!-- section title -->
                        <div class="section-title space__bottom--30 space__bottom__md--30 space__bottom__lm--20">
                            <h3 class="section-title__sub">Uzman Kadromuz</h3>
                            <h2 class="section-title__title">Deneyimli Profesyonel Ekibimiz</h2>
                        </div>
                        <p class="team-text">Karaçavuş Şirketler Grubu bünyesindeki uzman mühendis ve teknik kadromuz, grup şirketleri genelinde her projede en yüksek kaliteyi güvence altına alır.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6">
                            <ul class="nav team-member-link-wrapper" id="nav-tab2" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#team-member1">
                                        <img width="200" height="190" src="{{ asset('assets/img/team/team-member1-sq.webp') }}" class="img-fluid" alt="">
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#team-member2">
                                        <img width="200" height="190" src="{{ asset('assets/img/team/team-member2-sq.webp') }}" class="img-fluid" alt="">
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#team-member3">
                                        <img width="200" height="190" src="{{ asset('assets/img/team/team-member3-sq.webp') }}" class="img-fluid" alt="">
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#team-member4">
                                        <img width="200" height="190" src="{{ asset('assets/img/team/team-member4-sq.webp') }}" class="img-fluid" alt="">
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="tab-content team-member__content-wrapper">
                                <div class="tab-pane fade show active" id="team-member1" role="tabpanel">
                                    <div class="single-team-member--shadow text-center">
                                        <div class="single-team-member__image">
                                            <img width="510" height="776" src="{{ asset('assets/img/team/team-member1.webp') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="team-member2" role="tabpanel">
                                    <div class="single-team-member--shadow text-center">
                                        <div class="single-team-member__image">
                                            <img width="510" height="775" src="{{ asset('assets/img/team/team-member2.webp') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="team-member3" role="tabpanel">
                                    <div class="single-team-member--shadow text-center">
                                        <div class="single-team-member__image">
                                            <img width="510" height="775" src="{{ asset('assets/img/team/team-member3.webp') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="team-member4" role="tabpanel">
                                    <div class="single-team-member--shadow text-center">
                                        <div class="single-team-member__image">
                                            <img width="510" height="775" src="{{ asset('assets/img/team/team-member4.webp') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of team area  ====================-->
    <!--====================  testimonial area ====================-->
    <div class="testimonial-area space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title text-center  space__bottom--40 mx-auto">
                        <h3 class="section-title__sub">Referanslarımız</h3>
                        <h2 class="section-title__title">Müşterilerimiz Ne Diyor?</h2>
                    </div>
                    <!-- testimonial slider -->
                    <div class="testimonial-multi-slider-wrapper space__inner__bottom--50 space__inner__bottom__md--50 space__inner__bottom__lm--50">
                        <div class="single-testimonial single-testimonial--style2">
                            <p class="single-testimonial__text space__bottom--20"> <span class="quote-left">"</span>
                                Karaçavuş Şirketler Grubu ile çalışmak büyük bir memnuniyet. Projemizi zamanında ve bütçe dahilinde teslim ettiler. <span class="quote-right">"</span></p>
                            <h5 class="single-testimonial__author">A** V***</h5>
                            <p class="single-testimonial__author-des">A** Yapı A.Ş.</p>
                        </div>
                        <div class="single-testimonial single-testimonial--style2">
                            <p class="single-testimonial__text space__bottom--20"> <span class="quote-left">"</span>
                                Profesyonel ekipleri ve modern ekipmanlarıyla hafriyat sürecini sorunsuz yönettiler. <span class="quote-right">"</span></p>
                            <h5 class="single-testimonial__author">K** A***</h5>
                            <p class="single-testimonial__author-des">K** Yapı Taahhüt A.Ş.</p>
                        </div>
                        <div class="single-testimonial single-testimonial--style2">
                            <p class="single-testimonial__text space__bottom--20"> <span class="quote-left">"</span>
                                Güvenilir, hızlı ve kaliteli hizmet. Bir dahaki projemizde de tercihimiz Karaçavuş olacak. <span class="quote-right">"</span></p>
                            <h5 class="single-testimonial__author">S** Y***</h5>
                            <p class="single-testimonial__author-des">D** İnşaat Ltd</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of testimonial area  ====================-->
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
