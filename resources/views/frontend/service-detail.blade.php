@extends('layouts.frontend')

@section('title', $service->title . ' | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>{{ $service->title }}</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li><a href="/hizmetler">Hizmetlerimiz</a></li>
                            <li>{{ $service->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->

    <!--====================  Service detail ====================-->
    <div class="space__top--r120 space__bottom--r120">
        <div class="container">
            <div class="row">

                <!-- Left: image + meta -->
                <div class="col-lg-5 space__bottom--60">
                    <div style="position:relative; margin-bottom:32px; overflow:hidden; border-radius:2px;">
                        <img src="{{ $service->image_url }}"
                             class="img-fluid" style="width:100%; height:380px; object-fit:cover;"
                             alt="{{ $service->title }}">
                        @if($service->sector)
                        <div style="position:absolute; bottom:0; left:0; right:0; padding:20px 24px; background:linear-gradient(transparent, rgba(0,0,0,0.75));">
                            <span style="font-size:11px; text-transform:uppercase; letter-spacing:3px; color:#c8a951; font-family:'Rajdhani',sans-serif;">{{ $service->sector }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Icon + title badge -->
                    <div style="display:flex; align-items:center; gap:16px; margin-bottom:28px;">
                        <div style="width:60px; height:60px; background:#1a1a1a; border-radius:2px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="{{ $service->icon }}" style="font-size:26px; color:#c8a951;"></i>
                        </div>
                        @if($service->company)
                        <div>
                            <span style="display:block; font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#999; font-family:'Rajdhani',sans-serif;">İlgili Şirket</span>
                            <span style="font-size:14px; color:#444; font-family:'Rajdhani',sans-serif; font-weight:600;">{{ $service->company }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Features list -->
                    @if($service->features && count($service->features))
                    <div style="border:1px solid #e5e5e5; padding:28px; border-radius:2px;">
                        <h5 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:20px; font-family:'Rajdhani',sans-serif;">Kapsam</h5>
                        <ul style="list-style:none; padding:0; margin:0;">
                            @foreach($service->features as $i => $feature)
                            <li style="display:flex; align-items:center; gap:12px; padding:10px 0; border-bottom:{{ $i < count($service->features)-1 ? '1px solid #f0f0f0' : 'none' }};">
                                <span style="width:24px; height:24px; background:#c8a951; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:11px; font-weight:700; color:#fff; font-family:'Rajdhani',sans-serif;">{{ $i+1 }}</span>
                                <span style="font-size:14px; color:#444;">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Back link -->
                    <div style="margin-top:28px;">
                        <a href="/hizmetler" style="display:inline-flex; align-items:center; gap:8px; font-size:12px; text-transform:uppercase; letter-spacing:2px; font-weight:600; color:#1a1a1a; font-family:'Rajdhani',sans-serif; text-decoration:none; border-bottom:2px solid #c8a951; padding-bottom:2px;">
                            <i class="fa fa-arrow-left" style="font-size:10px;"></i> Tüm Hizmetler
                        </a>
                    </div>
                </div>

                <!-- Right: description -->
                <div class="col-lg-6 offset-lg-1 space__bottom--60">

                    <span style="display:inline-block; font-size:11px; text-transform:uppercase; letter-spacing:3px; color:#c8a951; margin-bottom:14px; font-family:'Rajdhani',sans-serif;">Hizmet Detayı</span>
                    <div style="width:48px; height:3px; background:#c8a951; margin-bottom:24px;"></div>

                    <h1 style="font-size:32px; font-weight:700; color:#1a1a1a; line-height:1.3; font-family:'Rajdhani',sans-serif; text-transform:uppercase; margin-bottom:16px;">
                        {{ $service->title }}
                    </h1>

                    @if($service->excerpt)
                    <p style="font-size:17px; color:#888; font-style:italic; margin-bottom:32px; line-height:1.7;">{{ $service->excerpt }}</p>
                    @endif

                    <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:16px; font-family:'Rajdhani',sans-serif;">Hakkında</h4>
                    <div style="width:48px; height:3px; background:#c8a951; margin-bottom:24px;"></div>
                    <p style="font-size:16px; color:#444; line-height:1.85; margin-bottom:48px;">{{ $service->content }}</p>

                    <!-- CTA -->
                    <div style="background:#fafaf8; border-left:4px solid #c8a951; padding:28px 32px;">
                        <p style="font-size:16px; color:#1a1a1a; font-weight:600; margin-bottom:16px; font-family:'Rajdhani',sans-serif;">Bu hizmet hakkında teklif almak ister misiniz?</p>
                        <a href="/iletisim" class="default-btn">Bize Ulaşın</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--====================  End of service detail  ====================-->

    <!--====================  Other services ====================-->
    @if($others->count())
    <div style="background:#f9f9f7; padding:80px 0;">
        <div class="container">
            <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:8px; font-family:'Rajdhani',sans-serif; text-align:center;">Karaçavuş Şirketler Grubu</h4>
            <h3 style="font-size:28px; font-weight:700; color:#1a1a1a; text-align:center; margin-bottom:48px; font-family:'Rajdhani',sans-serif;">Diğer Hizmetlerimiz</h3>

            <div class="row">
                @foreach($others as $other)
                <div class="col-lg-3 col-md-4 col-6 space__bottom--30">
                    <a href="{{ route('service.show', $other->slug) }}" style="display:flex; align-items:center; gap:12px; padding:16px; border:1px solid #e5e5e5; background:#fff; border-radius:2px; text-decoration:none; color:#1a1a1a; transition:border-color .25s, box-shadow .25s;">
                        <div style="width:44px; height:44px; background:#f5f0e8; border-radius:2px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="{{ $other->icon }}" style="font-size:20px; color:#c8a951;"></i>
                        </div>
                        <span style="font-size:13px; font-weight:600; font-family:'Rajdhani',sans-serif; line-height:1.3; text-transform:uppercase;">{{ $other->title }}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!--====================  End of other services  ====================-->

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
    <!--====================  End of brand logo area  ====================-->
@endsection
