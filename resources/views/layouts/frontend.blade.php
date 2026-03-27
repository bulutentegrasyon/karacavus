<!DOCTYPE html>
<html class="no-js" lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Karaçavuş Şirketler Grubu | Hafriyat, İnşaat ve Proje Geliştirme')</title>
    <meta name="description" content="Karaçavuş Şirketler Grubu — 2001'den bu yana 5 şirket çatısı altında hafriyat, inşaat, altyapı ve otomotiv alanlarında güvenilir çözüm ortağınız.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- CSS
	============================================ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.min.css') }}">
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.min.css') }}">
    <!-- CSS Animation CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/cssanimation.min.css') }}">
    <!-- Justified Gallery CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/justifiedGallery.min.css') }}">
    <!-- Light Gallery CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/light-gallery.min.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <!--====================  header area ====================-->
    <div class="header-area header-sticky bg-img space__inner--y40 background-repeat--x background-color--dark d-none d-lg-block" data-bg="{{ asset('assets/img/icons/ruler.webp') }}">
        <!-- menu bar -->
        <div class="menu-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  position-relative">
                        <div class="menu-bar-wrapper background-color--default space__inner--x35">
                            <div class="menu-bar-wrapper-inner">
                                <div class="row align-items-center">
                                    <div class="col-lg-2">
                                        <div class="brand-logo">
                                            <a href="/">
                                                <img width="142" height="31" src="{{ asset('assets/img/logo.webp') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="navigation-area d-flex justify-content-end align-items-center">
                                            <!-- navigation menu -->
                                            <nav class="main-nav-menu">
                                                <ul class="d-flex justify-content-end">
                                                    <li><a href="/hakkimizda">Hakkımızda</a></li>
                                                    <li><a href="/hizmetler">Hizmetler</a></li>
                                                    <li><a href="/projeler">Projeler</a></li>
                                                    <li><a href="/referanslar">Referanslar</a></li>
                                                    <li><a href="/sirketlerimiz">Şirketlerimiz</a></li>
                                                    <li><a href="/blog">Blog</a></li>
                                                    <li><a href="/iletisim">İletişim</a></li>
                                                </ul>
                                            </nav>
                                            <!-- search icon nav menu -->
                                            <div class="nav-search-icon">
                                                <button class="header-search-toggle"><i class="fa fa-search"></i></button>
                                                <div class="header-search-form">
                                                    <form action="#">
                                                        <input type="text" placeholder="Ara...">
                                                        <button><i class="fa fa-search"></i></button>
                                                    </form>
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
        </div>
    </div>
    <!--====================  End of header area  ====================-->
    <!--====================  mobile header ====================-->
    <div class="mobile-header header-sticky bg-img space__inner--y30 background-repeat--x background-color--dark d-block d-lg-none" data-bg="{{ asset('assets/img/icons/ruler.webp') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="brand-logo">
                        <a href="/">
                            <img width="158" height="36" src="{{ asset('assets/img/logo-white.webp') }}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mobile-menu-trigger-wrapper text-end" id="mobile-menu-trigger">
                        <span class="mobile-menu-trigger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of mobile header  ====================-->
    <!--====================  offcanvas mobile menu ====================-->
    <div class="offcanvas-mobile-menu" id="mobile-menu-overlay">
        <a href="javascript:void(0)" class="offcanvas-menu-close" id="mobile-menu-close-trigger">
            <span class="menu-close"></span>
        </a>
        <div class="offcanvas-wrapper">
            <div class="offcanvas-inner-content">
                <div class="offcanvas-mobile-search-area">
                    <form action="#">
                        <input type="search" placeholder="Ara...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <nav class="offcanvas-navigation">
                    <ul>
                        <li><a href="/hakkimizda">Hakkımızda</a></li>
                        <li><a href="/hizmetler">Hizmetler</a></li>
                        <li><a href="/projeler">Projeler</a></li>
                        <li><a href="/referanslar">Referanslar</a></li>
                        <li><a href="/sirketlerimiz">Şirketlerimiz</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/iletisim">İletişim</a></li>
                    </ul>
                </nav>
                <div class="offcanvas-widget-area">
                    <!--Off Canvas Widget Social Start-->
                    <div class="off-canvas-widget-social">
                        <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                        <a href="#" title="Youtube"><i class="fa fa-youtube-play"></i></a>
                        <a href="#" title="Vimeo"><i class="fa fa-vimeo-square"></i></a>
                    </div>
                    <!--Off Canvas Widget Social End-->
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of offcanvas mobile menu  ====================-->

    @yield('content')

    <!--====================  newsletter area ====================-->
    <div class="newsletter-area newsletter-area-bg bg-img" data-bg="{{ asset('assets/img/backgrounds/newsletter-bg.webp') }}">
        <div class="newsletter-wrapper background-color--default-overlay space__inner--y60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-10 mx-auto">
                        <div class="row align-items-center">
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <!-- newsletter title -->
                                <h3 class="newsletter-title"><span>Bültenimize</span> Abone Olun</h3>
                            </div>
                            <div class="col-lg-8">
                                <div class="newsletter-form">
                                    <form id="mc-form" class="mc-form">
                                        <input type="email" placeholder="E-posta adresinizi girin">
                                        <button class="theme-button" type="submit">Abone Ol</button>
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                    </div>
                                    <!-- mailchimp-alerts end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of newsletter area  ====================-->
    <!--====================  footer area ====================-->
    <div class="footer-area bg-img space__inner--ry120" data-bg="{{ asset('assets/img/backgrounds/footer-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-widget__logo space__bottom--40">
                            <a href="/">
                                <img width="158" height="36" src="{{ asset('assets/img/logo-white.webp') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <p class="footer-widget__text space__bottom--20">Karaçavuş Şirketler Grubu olarak 2001'den bu yana hafriyat, inşaat ve otomotiv alanlarında kaliteli ve güvenilir çözümler sunuyoruz.</p>
                        <ul class="social-icons">
                            <li><a href="//www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="//www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="//www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="//plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget space__top--15 space__top__md--40 space__top__lm--40">
                        <h5 class="footer-widget__title space__bottom--20">Kurumsal</h5>
                        <ul class="footer-widget__menu">
                            <li><a href="/hakkimizda">Hakkımızda</a></li>
                            <li><a href="/hizmetler">Hizmetlerimiz</a></li>
                            <li><a href="/projeler">Projelerimiz</a></li>
                            <li><a href="/referanslar">Referanslar</a></li>
                            <li><a href="/sirketlerimiz">Şirketlerimiz</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/iletisim">İletişim</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget space__top--15 space__top__md--40 space__top__lm--40">
                        <h5 class="footer-widget__title space__bottom--20">Hizmetler</h5>
                        <ul class="footer-widget__menu">
                            <li><a href="/hizmetler/hafriyat-ve-temel-kazi">Hafriyat ve Temel Kazı</a></li>
                            <li><a href="/hizmetler/toprak-tasima-ve-nakliye">Toprak Taşıma ve Nakliye</a></li>
                            <li><a href="/hizmetler/altyapi-insaati">Altyapı İnşaatı</a></li>
                            <li><a href="/hizmetler/ustyapi-ve-yapi-insaati">Üstyapı ve Yapı İnşaatı</a></li>
                            <li><a href="/hizmetler/kontrollu-yikim">Kontrollü Yıkım</a></li>
                            <li><a href="/hizmetler" style="color:#c8a951; font-weight:600;">Tüm Hizmetler &rarr;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-widget__title space__top--15 space__bottom--20 space__top__md--40 space__top__lm--40">
                        İletişim</h5>
                    <div class="footer-contact-wrapper">
                        <div class="single-footer-contact">
                            <div class="single-footer-contact__icon"><i class="fa fa-map-marker"></i></div>
                            <div class="single-footer-contact__text">Soğanlık Yeni Mah. Pega Gaz Sk. Aura Residence No:4/A K.6 D.48 Kartal / İstanbul</div>
                        </div>
                        <div class="single-footer-contact">
                            <div class="single-footer-contact__icon"><i class="fa fa-phone"></i></div>
                            <div class="single-footer-contact__text"><a href="tel:+905397305065">0539 730 50 65</a></div>
                        </div>
                        <div class="single-footer-contact">
                            <div class="single-footer-contact__icon"><i class="fa fa-globe"></i></div>
                            <div class="single-footer-contact__text"><a href="mailto:info@karacavussirketlerigrubu.com">info@karacavussirketlerigrubu.com</a>
                                <br> <a href="https://www.karacavussirketlerigrubu.com">www.karacavussirketlerigrubu.com</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright text -->
    <div class="copyright-area background-color--deep-dark space__inner--y30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="copyright-text">&copy; Karaçavuş Şirketler Grubu {{ date('Y') }} — Tüm Hakları Saklıdır</p>
                    <p class="copyright-text mt-2">
                        <a href="https://swantro.com" target="_blank" class="footer-credit" title="Swantro Yazılım tarafından hazırlanmıştır">
                            <img src="https://swantro.com/public/swantro_web/assets/images/resources/logo.png" alt="Swantro" style="height:22px;opacity:.7;filter:brightness(0) invert(1);vertical-align:middle;">
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of footer area  ====================-->
    <!--====================  scroll top ====================-->
    <button class="scroll-top" id="scroll-top">
        <i class="fa fa-angle-up"></i>
    </button>
    <!--====================  End of scroll top  ====================-->
    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Slick slider JS -->
    <script src="{{ asset('assets/js/plugins/slick.min.js') }}"></script>
    <!-- Counterup JS -->
    <script src="{{ asset('assets/js/plugins/counterup.min.js') }}"></script>
    <!-- Waypoint JS -->
    <script src="{{ asset('assets/js/plugins/waypoint.min.js') }}"></script>
    <!-- Justified Gallery JS -->
    <script src="{{ asset('assets/js/plugins/justifiedGallery.min.js') }}"></script>
    <!-- Image Loaded JS -->
    <script src="{{ asset('assets/js/plugins/imageloaded.min.js') }}"></script>
    <!-- Masonry JS -->
    <script src="{{ asset('assets/js/plugins/masonry.min.js') }}"></script>
    <!-- Light Gallery JS -->
    <script src="{{ asset('assets/js/plugins/light-gallery.min.js') }}"></script>
    <!-- Mailchimp JS -->
    <script src="{{ asset('assets/js/plugins/mailchimp-ajax-submit.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
