@extends('layouts.frontend')

@section('title', 'İletişim | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>İletişim</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li>İletişim</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->
    <!--====================  contact area ====================-->
    <div class="conact-section space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col space__bottom--40">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.22268960882!2d-118.69511008446011!3d34.0381583259191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e81fcf6add4e6b%3A0x2e40b4a05c4cc7a0!2sThe%20Business%20Agency!5e0!3m2!1sen!2sbd!4v1571570206192!5m2!1sen!2sbd"></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="contact-information">
                        <h4 class="space__bottom--30">Bize Ulaşın</h4>
                        <ul>
                            <li>
                                <span class="icon"><i class="fa fa-map-marker"></i></span>
                                <span class="text"><span>Soğanlık Yeni Mah. Pega Gaz Sk. Aura Residence No:4/A K.6 D.48 Kartal / İstanbul</span></span>
                            </li>
                            <li>
                                <span class="icon"><i class="fa fa-phone"></i></span>
                                <span class="text"><a href="tel:+905397305065">0539 730 50 65</a></span>
                            </li>
                            <li>
                                <span class="icon"><i class="fa fa-envelope-open"></i></span>
                                <span class="text"><a href="mailto:info@karacavussirketlerigrubu.com">info@karacavussirketlerigrubu.com</a></span>
                            </li>
                            <li>
                                <span class="icon"><i class="fa fa-clock-o"></i></span>
                                <span class="text"><span>Pzt–Cts: 08:00–18:00</span></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="contact-form">
                        <h4 class="space__bottom--30">Mesaj Gönderin</h4>
                        <form id="contact-form" action="#" method="post">
                            @csrf
                            <div class="row row-10">
                                <div class="col-md-6 col-12 space__bottom--20"><input name="con_name" type="text" placeholder="Ad Soyad"></div>
                                <div class="col-md-6 col-12 space__bottom--20"><input name="con_email" type="email" placeholder="E-posta"></div>
                                <div class="col-md-6 col-12 space__bottom--20"><input name="con_phone" type="tel" placeholder="Telefon"></div>
                                <div class="col-md-6 col-12 space__bottom--20"><input name="con_subject" type="text" placeholder="Konu"></div>
                                <div class="col-12"><textarea name="con_message" placeholder="Mesajınız"></textarea></div>
                                <div class="col-12"><button>Mesaj Gönder</button></div>
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of contact area  ====================-->
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
