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
                    <div class="section-title text-center space__bottom--40 mx-auto">
                        <h3 class="section-title__sub">Referanslarımız</h3>
                        <h2 class="section-title__title">Tamamladığımız Projeler</h2>
                    </div>

                    @if($categories->count() > 1)
                    <!-- Category filter buttons -->
                    <div class="text-center space__bottom--40">
                        <button class="btn btn-outline-dark btn-sm mr-1 mb-2 filter-btn active" data-cat="all">Tümü</button>
                        @foreach($categories as $cat)
                        <button class="btn btn-outline-dark btn-sm mr-1 mb-2 filter-btn" data-cat="{{ $cat }}">{{ $cat }}</button>
                        @endforeach
                    </div>
                    @endif

                    <div class="row" id="projects-grid">
                        @forelse($projects as $p)
                        <div class="col-lg-4 col-md-6 col-12 space__bottom--40 project-item" data-cat="{{ $p->category }}">
                            <div class="single-project-wrapper single-project-wrapper--reduced-abs">
                                <a class="single-project-item p-0" href="{{ route('project.show', $p->slug) }}">
                                    <img width="440" height="360" src="{{ $p->image_url }}" class="img-fluid" alt="{{ $p->title }}"
                                         style="width:100%; height:240px; object-fit:cover;">
                                    <span class="single-project-title">{{ $p->title }}</span>
                                </a>
                                @if($p->category || $p->location)
                                <div style="padding:12px 16px 4px; font-size:12px; color:#999; font-family:'Rajdhani',sans-serif; text-transform:uppercase; letter-spacing:1px;">
                                    @if($p->category)<span style="color:#c8a951;">{{ $p->category }}</span>@endif
                                    @if($p->category && $p->location) · @endif
                                    @if($p->location){{ $p->location }}@endif
                                    @if($p->year) · {{ $p->year }}@endif
                                </div>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5">
                            <p style="color:#999;">Henüz proje eklenmemiş.</p>
                        </div>
                        @endforelse
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

    <style>
        .filter-btn.active { background:#1a1a1a; color:#fff; border-color:#1a1a1a; }
        .project-item { transition: opacity .25s; }
        .project-item.hidden { display: none; }
    </style>

    @if($categories->count() > 1)
    <script>
        document.querySelectorAll('.filter-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(function(b) { b.classList.remove('active'); });
                this.classList.add('active');
                var cat = this.dataset.cat;
                document.querySelectorAll('.project-item').forEach(function(item) {
                    if (cat === 'all' || item.dataset.cat === cat) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    </script>
    @endif
@endsection
