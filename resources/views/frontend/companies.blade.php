@extends('layouts.frontend')

@section('title', 'Şirketlerimiz | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>Şirketlerimiz</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li>Şirketlerimiz</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->

    <div class="space__top--r120 space__bottom--r120">
        <div class="container">

            <!-- Section intro -->
            <div class="row space__bottom--60">
                <div class="col-lg-7">
                    <h3 class="section-title__sub">Bünyemizdeki Firmalar</h3>
                    <h2 class="section-title__title" style="font-size:36px; line-height:1.2; margin-bottom:20px;">Karaçavuş Şirketler Grubu</h2>
                    <p style="color:#666; font-size:16px; line-height:1.85;">
                        2001'den bu yana hafriyat, inşaat, altyapı ve otomotiv sektörlerinde faaliyet gösteren grubumuz, beş ayrı şirket çatısı altında entegre ve güvenilir hizmet sunmaktadır.
                    </p>
                </div>
                <div class="col-lg-5 d-flex align-items-end justify-content-lg-end">
                    <div style="text-align:right;">
                        <span style="display:block; font-size:72px; font-weight:700; color:#1B3A6B; line-height:1; font-family:'Rajdhani',sans-serif; letter-spacing:-2px;">{{ str_pad($companies->count(), 2, '0', STR_PAD_LEFT) }}</span>
                        <span style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999;">Şirket</span>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div style="border-top:2px solid #1a1a1a; margin-bottom:0;"></div>

            @foreach($companies as $c)
            <a href="{{ route('company.show', $c->slug) }}" class="company-list-item" style="display:block; text-decoration:none; color:inherit; border-bottom:1px solid #e5e5e5;">
                <div class="row align-items-center" style="padding:48px 0; transition:background .25s;">
                    <!-- Number -->
                    <div class="col-lg-1 col-2 d-none d-md-flex align-items-center">
                        <span style="font-size:48px; font-weight:700; color:#c8d3e4; font-family:'Rajdhani',sans-serif; line-height:1; display:block;">{{ $c->number }}</span>
                    </div>
                    <!-- Icon -->
                    <div class="col-auto d-none d-lg-flex align-items-center" style="padding-right:30px;">
                        <div style="width:64px; height:64px; background:#1B3A6B; border-radius:2px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="{{ $c->icon }}" style="font-size:28px; color:#fff;"></i>
                        </div>
                    </div>
                    <!-- Text -->
                    <div class="col">
                        <span style="display:block; font-size:11px; text-transform:uppercase; letter-spacing:3px; color:#1B3A6B; margin-bottom:6px; font-family:'Rajdhani',sans-serif;">{{ $c->sector }}</span>
                        <h3 style="font-size:20px; font-weight:700; color:#1a1a1a; margin:0 0 8px; line-height:1.3; font-family:'Rajdhani',sans-serif; text-transform:uppercase;">{{ $c->name }}</h3>
                        <p style="font-size:14px; color:#888; margin:0; line-height:1.7; max-width:640px;">{{ $c->about }}</p>
                    </div>
                    <!-- CTA -->
                    <div class="col-lg-2 col-auto d-none d-lg-flex align-items-center justify-content-end">
                        <span style="display:inline-flex; align-items:center; gap:8px; font-size:12px; text-transform:uppercase; letter-spacing:2px; font-weight:600; color:#1a1a1a; font-family:'Rajdhani',sans-serif; border-bottom:2px solid #1B3A6B; padding-bottom:2px;">
                            İncele <i class="fa fa-arrow-right" style="font-size:10px;"></i>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach

            <!-- Bottom divider -->
            <div style="border-bottom:2px solid #1a1a1a; margin-bottom:160px;"></div>

        </div>
    </div>

    <!-- Hover style -->
    <style>
        .company-list-item:hover { background:#fafaf8; }
        .company-list-item:hover h3 { color:#1B3A6B; }
    </style>

    <!--====================  CTA area ====================-->
    <div class="bg-img space__inner--ry80" data-bg="{{ asset('assets/img/backgrounds/cta-bg.webp') }}" style="background-size:cover; background-position:center;">
        <div style="background:rgba(0,0,0,0.65); padding:60px 0;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 space__bottom__md--30 space__bottom__lm--30">
                        <h3 style="font-size:38px; font-weight:700; color:#fff; font-family:'Rajdhani',sans-serif; margin:0 0 12px; text-transform:uppercase;">
                            İş Birliği <span style="color:#fff;">Yapalım</span>
                        </h3>
                        <p style="color:#ccc; font-size:16px; margin:0; line-height:1.7;">Projeleriniz için Karaçavuş Şirketler Grubu'nun gücünden yararlanın. Uzman ekibimiz sizinle iletişime geçmeye hazır.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="/iletisim" class="default-btn">Bize Ulaşın</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of CTA area  ====================-->
    <!--====================  brand logo area ====================-->
    <div class="brand-logo-area space__bottom--r120" style="margin-top:120px;">
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
    <!--====================  End of brand logo area  ====================-->
@endsection
