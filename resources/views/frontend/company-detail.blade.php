@extends('layouts.frontend')

@section('title', $company['name'] . ' | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>{{ $company['short'] }}</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li><a href="{{ route('companies') }}">Şirketlerimiz</a></li>
                            <li>{{ $company['short'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->

    <!--====================  Company intro ====================-->
    <div class="space__top--r120">
        <div class="container">
            <div class="row">

                <!-- Left: Company identity -->
                <div class="col-lg-5 space__bottom--60">
                    <!-- Number badge -->
                    <div style="display:flex; align-items:center; gap:16px; margin-bottom:30px;">
                        <span style="font-size:64px; font-weight:700; color:#f0e8d4; line-height:1; font-family:'Rajdhani',sans-serif;">{{ $company['number'] }}</span>
                        <div style="width:1px; height:50px; background:#e0e0e0;"></div>
                        <div style="width:56px; height:56px; background:#1a1a1a; border-radius:2px; display:flex; align-items:center; justify-content:center;">
                            <i class="{{ $company['icon'] }}" style="font-size:24px; color:#c8a951;"></i>
                        </div>
                    </div>

                    <!-- Sector tag -->
                    <span style="display:inline-block; font-size:11px; text-transform:uppercase; letter-spacing:3px; color:#c8a951; margin-bottom:14px; font-family:'Rajdhani',sans-serif;">{{ $company['sector'] }}</span>

                    <!-- Full name -->
                    <h1 style="font-size:26px; font-weight:700; color:#1a1a1a; line-height:1.35; font-family:'Rajdhani',sans-serif; text-transform:uppercase; margin-bottom:16px;">
                        {{ $company['name'] }}
                    </h1>

                    <!-- Tagline -->
                    <p style="font-size:15px; color:#888; margin-bottom:32px; font-style:italic;">{{ $company['tagline'] }}</p>

                    <!-- Meta cards -->
                    <div class="row" style="margin-bottom:40px;">
                        <div class="col-6">
                            <div style="border:1px solid #e5e5e5; padding:20px; text-align:center; border-radius:2px;">
                                <span style="display:block; font-size:28px; font-weight:700; color:#c8a951; font-family:'Rajdhani',sans-serif; line-height:1;">{{ $company['established'] }}</span>
                                <span style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#999;">Kuruluş Yılı</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="border:1px solid #e5e5e5; padding:20px; text-align:center; border-radius:2px;">
                                <span style="display:block; font-size:28px; font-weight:700; color:#c8a951; font-family:'Rajdhani',sans-serif; line-height:1;">{{ 2026 - (int)$company['established'] }}+</span>
                                <span style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#999;">Yıllık Deneyim</span>
                            </div>
                        </div>
                    </div>

                    <!-- Address / Phone -->
                    @if(!empty($company['address']))
                    <div style="margin-bottom:16px; padding:16px; border-left:3px solid #c8a951; background:#fafafa;">
                        <div style="display:flex; align-items:flex-start; gap:10px; margin-bottom:{{ !empty($company['phone']) ? '10px' : '0' }};">
                            <i class="fa fa-map-marker" style="color:#c8a951; margin-top:3px; min-width:14px;"></i>
                            <span style="font-size:13px; color:#555; line-height:1.6;">{{ $company['address'] }}</span>
                        </div>
                        @if(!empty($company['phone']))
                        <div style="display:flex; align-items:center; gap:10px;">
                            <i class="fa fa-phone" style="color:#c8a951; min-width:14px;"></i>
                            <a href="tel:+90{{ preg_replace('/\D/', '', $company['phone']) }}" style="font-size:13px; color:#555; text-decoration:none;">{{ $company['phone'] }}</a>
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- Map -->
                    @if(!empty($company['map_query']))
                    <div style="margin-bottom:24px; border-radius:2px; overflow:hidden; border:1px solid #e5e5e5;">
                        <iframe
                            src="https://maps.google.com/maps?q={{ $company['map_query'] }}&output=embed&hl=tr"
                            width="100%"
                            height="220"
                            style="border:0; display:block;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    @endif

                    <!-- Back link -->
                    <a href="{{ route('companies') }}" style="display:inline-flex; align-items:center; gap:8px; font-size:12px; text-transform:uppercase; letter-spacing:2px; font-weight:600; color:#1a1a1a; font-family:'Rajdhani',sans-serif; text-decoration:none; border-bottom:2px solid #c8a951; padding-bottom:2px;">
                        <i class="fa fa-arrow-left" style="font-size:10px;"></i> Tüm Şirketler
                    </a>
                </div>

                <!-- Right: About + activities -->
                <div class="col-lg-6 offset-lg-1 space__bottom--60">

                    <!-- About -->
                    <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:16px; font-family:'Rajdhani',sans-serif;">Hakkında</h4>
                    <div style="width:48px; height:3px; background:#c8a951; margin-bottom:24px;"></div>
                    <p style="font-size:16px; color:#444; line-height:1.85; margin-bottom:48px;">{{ $company['about'] }}</p>

                    <!-- Activities -->
                    <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:16px; font-family:'Rajdhani',sans-serif;">Faaliyet Alanları</h4>
                    <div style="width:48px; height:3px; background:#c8a951; margin-bottom:24px;"></div>
                    <ul style="list-style:none; padding:0; margin:0 0 48px;">
                        @foreach($company['activities'] as $i => $activity)
                        <li style="display:flex; align-items:flex-start; gap:16px; padding:14px 0; border-bottom:1px solid #f0f0f0;">
                            <span style="flex-shrink:0; width:28px; height:28px; background:#1a1a1a; border-radius:2px; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; color:#c8a951; font-family:'Rajdhani',sans-serif;">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <span style="font-size:15px; color:#444; line-height:1.5; padding-top:4px;">{{ $activity }}</span>
                        </li>
                        @endforeach
                    </ul>

                    <!-- Vision quote -->
                    <blockquote style="border-left:4px solid #c8a951; margin:0; padding:20px 24px; background:#fafaf8;">
                        <p style="font-size:15px; color:#555; line-height:1.75; margin:0; font-style:italic;">{{ $company['vision'] }}</p>
                    </blockquote>
                </div>

            </div>
        </div>
    </div>
    <!--====================  End of Company intro  ====================-->

    <!--====================  Other companies ====================-->
    <div class="space__top--r120 space__bottom--r120" style="background:#f8f7f4;">
        <div class="container" style="padding-top:80px; padding-bottom:80px;">
            <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:8px; font-family:'Rajdhani',sans-serif; text-align:center;">Karaçavuş Şirketler Grubu</h4>
            <h3 style="font-size:28px; font-weight:700; color:#1a1a1a; text-align:center; margin-bottom:48px; font-family:'Rajdhani',sans-serif;">Diğer Şirketlerimiz</h3>

            @php
            $all = [
                ['slug' => 'karacavus-proje-gelistirme', 'short' => 'Karaçavuş Proje Geliştirme', 'sector' => 'Hafriyat · İnşaat · Proje', 'icon' => 'flaticon-020-planning'],
                ['slug' => 'asel-insaat-hafriyat',       'short' => 'Asel İnşaat Hafriyat',       'sector' => 'Altyapı · Üstyapı · Otomotiv', 'icon' => 'flaticon-008-machine-1'],
                ['slug' => 'omkar-insaat-hafriyat',      'short' => 'Ömkar Otomotiv',              'sector' => 'Otomotiv · Ticari Araç', 'icon' => 'flaticon-006-truck'],
                ['slug' => 'nayifogullari-insaat',       'short' => 'Nayifoğulları İnşaat',       'sector' => 'İnşaat · Sanayi · Ticaret', 'icon' => 'flaticon-037-forklift'],
                ['slug' => 'nayifogullari-ymk-yikim',   'short' => 'Nayifoğulları YMK Yıkım',   'sector' => 'Yıkım · Kentsel Dönüşüm', 'icon' => 'flaticon-016-gear'],
            ];
            @endphp

            <div class="row">
                @foreach($all as $other)
                    @if($other['slug'] !== $company['slug'])
                    <div class="col-lg-3 col-md-6 space__bottom--30">
                        <a href="{{ route('company.show', $other['slug']) }}" style="display:block; text-decoration:none; background:#fff; border:1px solid #e5e5e5; padding:30px 24px; border-radius:2px; transition:box-shadow .25s;" class="other-company-card">
                            <div style="width:48px; height:48px; background:#1a1a1a; border-radius:2px; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
                                <i class="{{ $other['icon'] }}" style="font-size:22px; color:#c8a951;"></i>
                            </div>
                            <span style="display:block; font-size:10px; text-transform:uppercase; letter-spacing:2px; color:#c8a951; margin-bottom:8px; font-family:'Rajdhani',sans-serif;">{{ $other['sector'] }}</span>
                            <h5 style="font-size:14px; font-weight:700; color:#1a1a1a; margin:0 0 12px; line-height:1.4; font-family:'Rajdhani',sans-serif; text-transform:uppercase;">{{ $other['short'] }}</h5>
                            <span style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#c8a951; font-family:'Rajdhani',sans-serif;">İncele →</span>
                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!--====================  End other companies  ====================-->

    <style>
        .other-company-card:hover { box-shadow: 0 8px 32px rgba(0,0,0,.08); }
        .other-company-card:hover h5 { color: #c8a951; }
    </style>

    <!--====================  CTA area ====================-->
    <div class="bg-img space__inner--ry80" data-bg="{{ asset('assets/img/backgrounds/cta-bg.webp') }}" style="background-size:cover; background-position:center;">
        <div style="background:rgba(0,0,0,0.65); padding:60px 0;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 space__bottom__md--30 space__bottom__lm--30">
                        <h3 style="font-size:38px; font-weight:700; color:#fff; font-family:'Rajdhani',sans-serif; margin:0 0 12px; text-transform:uppercase;">
                            İş Birliği <span style="color:#c8a951;">Yapalım</span>
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
    <div class="brand-logo-area space__bottom--r120">
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
