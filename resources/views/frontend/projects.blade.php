@extends('layouts.frontend')

@section('title', 'Projelerimiz | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>Projelerimiz</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li>Projelerimiz</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->
    <div class="project-section space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title text-center space__bottom--40 mx-auto">
                        <h3 class="section-title__sub">Referanslarımız</h3>
                        <h2 class="section-title__title">Tamamladığımız Projeler</h2>
                    </div>
                    {{-- ===== BÖLÜM 1: Hafriyat ve Kazı ===== --}}
                    <div class="section-title text-left space__bottom--30" style="border-left:4px solid #c8a951;padding-left:16px;margin-bottom:30px;">
                        <h3 style="font-size:20px;font-weight:700;font-family:'Rajdhani',sans-serif;text-transform:uppercase;margin:0;">Hafriyat ve Temel Kazı Çalışmaları</h3>
                    </div>
                    <div class="project-item-wrapper space__bottom--m40">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-01.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Hafriyat ve Kazı Çalışması</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-02.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Toprak Taşıma Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-03.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Altyapı Zemin Hazırlığı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-04.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Konut Projesi Temel Kazısı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-05.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Sanayi Tesisi Dolgu İşleri</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-06.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Yol Altyapı Çalışması</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-07.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Bina Yıkım Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-08.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Kazı ve Zemin İyileştirme</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-09.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">OSB Altyapı Hafriyatı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-10.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Büyük Ölçekli Toprak Düzleme</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-11.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Moloz Kaldırma ve Taşıma</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-12.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Mercedes Araç Filomuz</span>
                                    </a>
                                </div>
                            </div>
                            {{-- ek hafriyat/kazı --}}
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-04.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Şehir İçi Derin Temel Kazısı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-05.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Tarihi Çevre Yakını Hafriyat</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-09.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Akşam Hafriyat Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-10.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Ticari Yapı Derin Temel Kazısı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-13.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Kaya Zeminde Çoklu Ekipman Kazısı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-14.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Gece Vardiyası – Kentsel Kazı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-17.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Derin Temel Kazısı – Üç Ekskavatör</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-21.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Kaya Zemin Hafriyatı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-38.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Kentsel Dar Parselde Hafriyat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ===== BÖLÜM 2: Toprak Taşıma ===== --}}
                    <div class="section-title text-left space__bottom--30" style="border-left:4px solid #c8a951;padding-left:16px;margin-top:20px;margin-bottom:30px;">
                        <h3 style="font-size:20px;font-weight:700;font-family:'Rajdhani',sans-serif;text-transform:uppercase;margin:0;">Toprak Taşıma ve Araç Filosu</h3>
                    </div>
                    <div class="project-item-wrapper space__bottom--m40">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-02.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">İstanbul Şehir Merkezi Taşıma</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-03.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Hafriyat Yükleme Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-06.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Araç Filomuz – Saha Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-08.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Büyük Ölçekli Toprak Taşıma</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-11.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Konut Projesi Toprak Taşıma</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-15.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Konut Bölgesi Hafriyat Filomuz</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-18.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Açık Arazi Taşıma Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-22.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Geniş Arazi Toprak Taşıma</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-26.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">TOKİ Projesi Toprak Taşıma</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-29.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Kötü Hava Koşullarında Operasyon</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-32.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Kentsel Hafriyat Araç Filomuz</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-36.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Şehir Panoramalı Hafriyat Sahası</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ===== BÖLÜM 3: Açık Saha / Arazi ===== --}}
                    <div class="section-title text-left space__bottom--30" style="border-left:4px solid #c8a951;padding-left:16px;margin-top:20px;margin-bottom:30px;">
                        <h3 style="font-size:20px;font-weight:700;font-family:'Rajdhani',sans-serif;text-transform:uppercase;margin:0;">Açık Saha ve Arazi Operasyonları</h3>
                    </div>
                    <div class="project-item-wrapper space__bottom--m40">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-19.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Kırsal Alan Toprak Taşıma</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-23.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Açık Saha – Araç Filosu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-24.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Büyük Filo – Arazi Hafriyatı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-25.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Büyük Çaplı Arazi Hafriyatı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-27.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Orman Kenarı Kazı Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-28.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Açık Saha Hafriyat Ekibi</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-30.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Karma Filo Arazi Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-31.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Gün Batımı Hafriyat Sahası</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-33.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Açık Alan İş Makinesi Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-34.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Sabah Operasyonu – Sisli Hava</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-35.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">SANY Ekskavatör Sahamızda</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-37.webp') }}" class="img-fluid" alt="Karaçavuş Hafriyat Projesi">
                                        <span class="single-project-title">Vinçli Saha Operasyonu</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ===== BÖLÜM 4: Mihra Konakları İnşaat Projesi ===== --}}
                    <div class="section-title text-left space__bottom--30" style="border-left:4px solid #c8a951;padding-left:16px;margin-top:20px;margin-bottom:30px;">
                        <h3 style="font-size:20px;font-weight:700;font-family:'Rajdhani',sans-serif;text-transform:uppercase;margin:0;">Mihra Konakları – Konut Projesi</h3>
                    </div>
                    <div class="project-item-wrapper space__bottom--m40">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-42.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Saha Hafriyatı</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-39.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Proje Görseli</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-40.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Cephe Görseli</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-41.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Ön Cephe</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-43.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Blok Görünümü</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-44.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – B Blok</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-45.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Ön Görünüm</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-46.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Köşe Görünümü</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-47.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Sosyal Alan</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-48.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Yan Cephe</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-49.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Uzak Görünüm</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 space__bottom--40">
                                <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                    <a class="single-project-item p-0" href="#">
                                        <img width="440" height="360" src="{{ asset('assets/img/projects/real-project-50.webp') }}" class="img-fluid" alt="Mihra Konakları">
                                        <span class="single-project-title">Mihra Konakları – Göl Cephesi</span>
                                    </a>
                                </div>
                            </div>
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
