@extends('layouts.frontend')

@section('title', $project->title . ' | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>{{ $project->title }}</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li><a href="/projeler">Projelerimiz</a></li>
                            <li>{{ $project->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->

    <div class="space__top--r120 space__bottom--r120">
        <div class="container">
            <div class="row">

                <!-- Left: cover + meta -->
                <div class="col-lg-5 space__bottom--60">
                    <div style="position:relative; margin-bottom:32px; overflow:hidden; border-radius:2px;">
                        <img src="{{ $project->image_url }}" class="img-fluid"
                             style="width:100%; height:380px; object-fit:cover;" alt="{{ $project->title }}">
                        @if($project->category)
                        <div style="position:absolute; bottom:0; left:0; right:0; padding:20px 24px; background:linear-gradient(transparent, rgba(0,0,0,0.75));">
                            <span style="font-size:11px; text-transform:uppercase; letter-spacing:3px; color:#c8a951; font-family:'Rajdhani',sans-serif;">{{ $project->category }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Meta cards -->
                    <div class="row" style="margin-bottom:32px;">
                        @if($project->location)
                        <div class="col-6 space__bottom--20">
                            <div style="border:1px solid #e5e5e5; padding:18px; text-align:center; border-radius:2px;">
                                <span style="display:block; font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px; font-family:'Rajdhani',sans-serif;">Konum</span>
                                <span style="font-size:15px; font-weight:700; color:#1a1a1a; font-family:'Rajdhani',sans-serif;">{{ $project->location }}</span>
                            </div>
                        </div>
                        @endif
                        @if($project->year)
                        <div class="col-6 space__bottom--20">
                            <div style="border:1px solid #e5e5e5; padding:18px; text-align:center; border-radius:2px;">
                                <span style="display:block; font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px; font-family:'Rajdhani',sans-serif;">Yıl</span>
                                <span style="font-size:15px; font-weight:700; color:#1a1a1a; font-family:'Rajdhani',sans-serif;">{{ $project->year }}</span>
                            </div>
                        </div>
                        @endif
                        @if($project->client)
                        <div class="col-12">
                            <div style="border:1px solid #e5e5e5; padding:18px; border-radius:2px;">
                                <span style="display:block; font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px; font-family:'Rajdhani',sans-serif;">İşveren / Müşteri</span>
                                <span style="font-size:15px; font-weight:700; color:#1a1a1a; font-family:'Rajdhani',sans-serif;">{{ $project->client }}</span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Back link -->
                    <a href="/projeler" style="display:inline-flex; align-items:center; gap:8px; font-size:12px; text-transform:uppercase; letter-spacing:2px; font-weight:600; color:#1a1a1a; font-family:'Rajdhani',sans-serif; text-decoration:none; border-bottom:2px solid #c8a951; padding-bottom:2px;">
                        <i class="fa fa-arrow-left" style="font-size:10px;"></i> Tüm Projeler
                    </a>
                </div>

                <!-- Right: content -->
                <div class="col-lg-6 offset-lg-1 space__bottom--60">
                    <span style="display:inline-block; font-size:11px; text-transform:uppercase; letter-spacing:3px; color:#c8a951; margin-bottom:14px; font-family:'Rajdhani',sans-serif;">Proje Detayı</span>
                    <div style="width:48px; height:3px; background:#c8a951; margin-bottom:24px;"></div>

                    <h1 style="font-size:32px; font-weight:700; color:#1a1a1a; line-height:1.3; font-family:'Rajdhani',sans-serif; text-transform:uppercase; margin-bottom:16px;">
                        {{ $project->title }}
                    </h1>

                    @if($project->excerpt)
                    <p style="font-size:17px; color:#888; font-style:italic; margin-bottom:32px; line-height:1.7;">{{ $project->excerpt }}</p>
                    @endif

                    <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:16px; font-family:'Rajdhani',sans-serif;">Proje Hakkında</h4>
                    <div style="width:48px; height:3px; background:#c8a951; margin-bottom:24px;"></div>
                    <p style="font-size:16px; color:#444; line-height:1.85; margin-bottom:48px;">{{ $project->content }}</p>

                    @if($project->gallery && count($project->gallery))
                    <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:20px; font-family:'Rajdhani',sans-serif;">Proje Görselleri</h4>
                    <div class="row" style="margin-bottom:48px;">
                        @foreach($project->gallery as $img)
                        <div class="col-6 space__bottom--15">
                            <img src="{{ asset('storage/' . $img) }}" class="img-fluid" style="border-radius:2px; width:100%; height:140px; object-fit:cover;" alt="{{ $project->title }}">
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- CTA -->
                    <div style="background:#fafaf8; border-left:4px solid #c8a951; padding:28px 32px;">
                        <p style="font-size:16px; color:#1a1a1a; font-weight:600; margin-bottom:16px; font-family:'Rajdhani',sans-serif;">Bu proje kapsamında hizmet almak ister misiniz?</p>
                        <a href="/iletisim" class="default-btn">Bize Ulaşın</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if($others->count())
    <div style="background:#f9f9f7; padding:80px 0;">
        <div class="container">
            <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:8px; font-family:'Rajdhani',sans-serif; text-align:center;">Karaçavuş Şirketler Grubu</h4>
            <h3 style="font-size:28px; font-weight:700; color:#1a1a1a; text-align:center; margin-bottom:48px; font-family:'Rajdhani',sans-serif;">Diğer Projelerimiz</h3>
            <div class="row">
                @foreach($others->take(8) as $other)
                <div class="col-lg-3 col-md-4 col-6 space__bottom--30">
                    <a href="{{ route('project.show', $other->slug) }}" style="display:block; text-decoration:none; color:inherit;">
                        <div style="overflow:hidden; border-radius:2px; margin-bottom:10px;">
                            <img src="{{ $other->image_url }}" alt="{{ $other->title }}"
                                 style="width:100%; height:140px; object-fit:cover; display:block; transition:transform .35s;">
                        </div>
                        <span style="font-size:13px; font-weight:600; color:#1a1a1a; font-family:'Rajdhani',sans-serif; text-transform:uppercase; line-height:1.3; display:block;">{{ $other->title }}</span>
                        @if($other->location)<span style="font-size:12px; color:#999;">{{ $other->location }}</span>@endif
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

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
