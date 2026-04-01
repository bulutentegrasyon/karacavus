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
                            <i class="{{ $company['icon'] }}" style="font-size:24px; color:#1B3A6B;"></i>
                        </div>
                    </div>

                    <!-- Sector tag -->
                    <span style="display:inline-block; font-size:11px; text-transform:uppercase; letter-spacing:3px; color:#1B3A6B; margin-bottom:14px; font-family:'Rajdhani',sans-serif;">{{ $company['sector'] }}</span>

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
                                <span style="display:block; font-size:28px; font-weight:700; color:#1B3A6B; font-family:'Rajdhani',sans-serif; line-height:1;">{{ $company['established'] }}</span>
                                <span style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#999;">Kuruluş Yılı</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="border:1px solid #e5e5e5; padding:20px; text-align:center; border-radius:2px;">
                                <span style="display:block; font-size:28px; font-weight:700; color:#1B3A6B; font-family:'Rajdhani',sans-serif; line-height:1;">{{ 2026 - (int)$company['established'] }}+</span>
                                <span style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#999;">Yıllık Deneyim</span>
                            </div>
                        </div>
                    </div>

                    <!-- Address / Phone -->
                    @if(!empty($company['address']))
                    <div style="margin-bottom:16px; padding:16px; border-left:3px solid #1B3A6B; background:#fafafa;">
                        <div style="display:flex; align-items:flex-start; gap:10px; margin-bottom:{{ !empty($company['phone']) ? '10px' : '0' }};">
                            <i class="fa fa-map-marker" style="color:#1B3A6B; margin-top:3px; min-width:14px;"></i>
                            <span style="font-size:13px; color:#555; line-height:1.6;">{{ $company['address'] }}</span>
                        </div>
                        @if(!empty($company['phone']))
                        <div style="display:flex; align-items:center; gap:10px;">
                            <i class="fa fa-phone" style="color:#1B3A6B; min-width:14px;"></i>
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
                    <a href="{{ route('companies') }}" style="display:inline-flex; align-items:center; gap:8px; font-size:12px; text-transform:uppercase; letter-spacing:2px; font-weight:600; color:#1a1a1a; font-family:'Rajdhani',sans-serif; text-decoration:none; border-bottom:2px solid #1B3A6B; padding-bottom:2px;">
                        <i class="fa fa-arrow-left" style="font-size:10px;"></i> Tüm Şirketler
                    </a>
                </div>

                <!-- Right: About + activities -->
                <div class="col-lg-6 offset-lg-1 space__bottom--60">

                    <!-- About -->
                    <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:16px; font-family:'Rajdhani',sans-serif;">Hakkında</h4>
                    <div style="width:48px; height:3px; background:#1B3A6B; margin-bottom:24px;"></div>
                    <p style="font-size:16px; color:#444; line-height:1.85; margin-bottom:48px;">{{ $company['about'] }}</p>

                    <!-- Activities -->
                    <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:16px; font-family:'Rajdhani',sans-serif;">Faaliyet Alanları</h4>
                    <div style="width:48px; height:3px; background:#1B3A6B; margin-bottom:24px;"></div>
                    <ul style="list-style:none; padding:0; margin:0 0 48px;">
                        @foreach($company['activities'] as $i => $activity)
                        <li style="display:flex; align-items:flex-start; gap:16px; padding:14px 0; border-bottom:1px solid #f0f0f0;">
                            <span style="flex-shrink:0; width:28px; height:28px; background:#1B3A6B; border-radius:2px; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; color:#fff; font-family:'Rajdhani',sans-serif;">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <span style="font-size:15px; color:#444; line-height:1.5; padding-top:4px;">{{ $activity }}</span>
                        </li>
                        @endforeach
                    </ul>

                    <!-- Vision quote -->
                    <blockquote style="border-left:4px solid #1B3A6B; margin:0; padding:20px 24px; background:#fafaf8;">
                        <p style="font-size:15px; color:#555; line-height:1.75; margin:0; font-style:italic;">{{ $company['vision'] }}</p>
                    </blockquote>
                </div>

            </div>
        </div>
    </div>
    <!--====================  End of Company intro  ====================-->

    <!--====================  References ====================-->
    @if($references->count() > 0)
    @php
        $imgPool = array_map(
            fn($n) => 'assets/img/projects/real-project-'.str_pad($n,2,'0',STR_PAD_LEFT).'.webp',
            array_merge(range(1,19), range(21,51))
        );
        $tamamlanan = $references->where('status','tamamlanan')->count();
        $devamEden  = $references->where('status','devam_eden')->count();
    @endphp

    <style>
    .cref-section { padding:80px 0; }
    .cref-filter-bar { display:flex; gap:8px; flex-wrap:wrap; margin-bottom:28px; }
    .cref-filter-btn {
        padding:8px 22px; font-size:11px; text-transform:uppercase; letter-spacing:2px;
        font-family:'Rajdhani',sans-serif; font-weight:700; border:2px solid #e0e0e0;
        background:#fff; color:#888; cursor:pointer; border-radius:2px; transition:.2s;
    }
    .cref-filter-btn.active { border-color:#1B3A6B; background:#1B3A6B; color:#fff; }
    .cref-filter-btn:hover:not(.active) { border-color:#1B3A6B; color:#1B3A6B; }

    .cref-item {
        border:1px solid #ececec;
        border-radius:3px;
        margin-bottom:6px;
        background:#fff;
        transition:box-shadow .2s, border-color .2s;
    }
    .cref-item:hover { border-color:#1B3A6B; box-shadow:0 2px 12px rgba(27,58,107,.08); }
    .cref-item.is-open { border-color:#1B3A6B; box-shadow:0 4px 18px rgba(27,58,107,.12); }

    .cref-trigger {
        display:flex; align-items:center; gap:14px;
        padding:14px 16px; cursor:pointer; user-select:none;
        border-radius:3px; transition:background .15s;
    }
    .cref-trigger:hover { background:#eef3fa; }
    .cref-item.is-open .cref-trigger { background:#eef3fa; border-radius:3px 3px 0 0; }

    .cref-num {
        flex-shrink:0; width:34px; height:34px; background:#1B3A6B; border-radius:2px;
        display:flex; align-items:center; justify-content:center;
        font-size:11px; font-weight:700; color:#fff; font-family:'Rajdhani',sans-serif;
    }
    .cref-name { flex:1; font-size:13px; font-weight:700; color:#1a1a1a; font-family:'Rajdhani',sans-serif; text-transform:uppercase; line-height:1.3; }
    .cref-qty  { flex-shrink:0; font-size:12px; color:#999; font-family:'Rajdhani',sans-serif; white-space:nowrap; }
    .cref-badge { flex-shrink:0; padding:3px 10px; border-radius:2px; font-size:10px; font-family:'Rajdhani',sans-serif; font-weight:700; letter-spacing:1px; }

    /* Açılır-kapanır göstergesi */
    .cref-expand-hint {
        flex-shrink:0; display:flex; align-items:center; gap:5px;
        font-size:10px; font-family:'Rajdhani',sans-serif; font-weight:700;
        letter-spacing:1.5px; text-transform:uppercase;
        color:#1B3A6B; white-space:nowrap;
    }
    .cref-expand-hint span { display:none; }
    @media(min-width:768px){ .cref-expand-hint span { display:inline; } }
    .cref-chevron { flex-shrink:0; color:#1B3A6B; font-size:16px; transition:transform .25s; }
    .cref-item.is-open .cref-chevron { transform:rotate(90deg); }
    .cref-item.is-open .cref-expand-hint { color:#888; }

    .cref-body { display:none; padding:20px 20px 28px 20px; border-top:1px dashed #f0ead8; }
    .cref-item.is-open .cref-body { display:block; }

    .cref-meta-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:12px 24px; margin-bottom:16px; }
    @media(max-width:576px){ .cref-meta-grid { grid-template-columns:1fr 1fr; } }
    .cref-meta-label { font-size:10px; text-transform:uppercase; letter-spacing:2px; color:#aaa; font-family:'Rajdhani',sans-serif; margin-bottom:3px; }
    .cref-meta-value { font-size:14px; font-weight:700; color:#1a1a1a; font-family:'Rajdhani',sans-serif; }

    .cref-media-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:8px; margin-top:16px; }
    @media(max-width:576px){ .cref-media-grid { grid-template-columns:1fr 1fr; } }
    .cref-media-item { position:relative; aspect-ratio:4/3; border-radius:2px; overflow:hidden; background:#111; }
    .cref-media-item img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; display:block; }
    .cref-media-item iframe { position:absolute; inset:0; width:100%; height:100%; border:0; }
    .cref-video-badge {
        position:absolute; top:8px; left:8px; z-index:2;
        background:rgba(0,0,0,.7); color:#fff; font-size:9px;
        font-family:'Rajdhani',sans-serif; font-weight:700; letter-spacing:1.5px;
        text-transform:uppercase; padding:3px 8px; border-radius:2px;
        display:flex; align-items:center; gap:5px; pointer-events:none;
    }
    .cref-video-badge i { color:#ff0000; font-size:11px; }
    .yt-thumb-wrap { cursor:pointer; }
    .yt-thumb-wrap:hover .yt-play-btn svg path:first-child { fill:#cc0000; }
    .yt-play-btn {
        position:absolute; inset:0; z-index:1;
        display:flex; align-items:center; justify-content:center;
        background:rgba(0,0,0,.15); transition:background .2s;
    }
    .yt-thumb-wrap:hover .yt-play-btn { background:rgba(0,0,0,.3); }
    .yt-thumb-wrap iframe { position:absolute; inset:0; width:100%; height:100%; border:0; }

    /* Pagination */
    .cref-pagination { display:flex; gap:6px; flex-wrap:wrap; align-items:center; margin-top:24px; }
    .cref-page-btn {
        min-width:36px; height:36px; padding:0 10px; border:1px solid #e0e0e0;
        background:#fff; color:#555; font-size:12px; font-family:'Rajdhani',sans-serif;
        font-weight:700; cursor:pointer; border-radius:2px; transition:.2s;
    }
    .cref-page-btn.active { background:#1B3A6B; border-color:#1B3A6B; color:#fff; }
    .cref-page-btn:hover:not(.active) { border-color:#1B3A6B; color:#1B3A6B; }
    .cref-page-btn:disabled { opacity:.35; cursor:default; }
    </style>

    <div class="cref-section">
        <div class="container">

            <span style="font-size:11px;text-transform:uppercase;letter-spacing:3px;color:#1B3A6B;font-family:'Rajdhani',sans-serif;">Referanslarımız</span>
            <div style="width:48px;height:3px;background:#1B3A6B;margin:10px 0 24px;"></div>

            <div class="cref-filter-bar">
                <button class="cref-filter-btn active" data-filter="all">Tümü <span style="opacity:.65;font-size:10px;">({{ $references->count() }})</span></button>
                <button class="cref-filter-btn" data-filter="tamamlanan">Tamamlanan <span style="opacity:.65;font-size:10px;">({{ $tamamlanan }})</span></button>
                <button class="cref-filter-btn" data-filter="devam_eden">Devam Eden <span style="opacity:.65;font-size:10px;">({{ $devamEden }})</span></button>
            </div>

            <div id="crefList">
            @foreach($references as $i => $ref)
            @php
                $pool = $imgPool; shuffle($pool);
                /* gallery varsa önceliklendir, yoksa havuzdan al */
                $gallery = $ref->gallery ?? [];
                $mediaItems = [];
                foreach($gallery as $g) {
                    if (str_contains($g, 'youtube.com/embed') || str_contains($g, 'youtu.be')) {
                        // YouTube embed URL → video
                        $embedSrc = $g;
                        if (str_contains($g, 'youtu.be/')) {
                            $vid = basename(parse_url($g, PHP_URL_PATH));
                            $embedSrc = 'https://www.youtube.com/embed/' . $vid;
                        }
                        $mediaItems[] = ['type' => 'video', 'src' => $embedSrc];
                    } else {
                        $mediaItems[] = ['type' => 'img', 'src' => $g];
                    }
                }
                $needed = max(0, 6 - count($mediaItems));
                foreach(array_slice($pool,0,$needed) as $p) { $mediaItems[] = ['type'=>'img','src'=>$p]; }
                $mediaItems = array_slice($mediaItems, 0, 6);
            @endphp
            <div class="cref-item" data-status="{{ $ref->status }}">

                <div class="cref-trigger" onclick="toggleCref(this)">
                    <div class="cref-num">{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}</div>
                    <div class="cref-name">{{ $ref->name }}</div>
                    <div class="cref-qty">{{ $ref->quantity }}</div>
                    <div class="cref-badge" style="background:{{ $ref->status==='tamamlanan'?'#e8f5e9':'#e8f0fb' }};color:{{ $ref->status==='tamamlanan'?'#388e3c':'#1B3A6B' }};">{{ $ref->status_label }}</div>
                    <div class="cref-expand-hint"><span>Detaylar</span> <i class="fa fa-angle-right cref-chevron"></i></div>
                </div>

                <div class="cref-body">
                    <div style="display:inline-flex;align-items:center;gap:8px;background:#1B3A6B;padding:6px 14px;border-radius:2px;margin-bottom:16px;">
                        <i class="fa fa-building" style="color:#fff;font-size:11px;"></i>
                        <span style="font-size:11px;font-weight:700;color:#fff;font-family:'Rajdhani',sans-serif;text-transform:uppercase;letter-spacing:2px;">{{ $ref->company ?? '—' }}</span>
                    </div>
                    <div class="cref-meta-grid">
                        <div>
                            <div class="cref-meta-label">İş Miktarı</div>
                            <div class="cref-meta-value">{{ $ref->quantity ?? '—' }}</div>
                        </div>
                        <div>
                            <div class="cref-meta-label">İş Türü</div>
                            <div class="cref-meta-value">{{ $ref->work_type ?? '—' }}</div>
                        </div>
                        @if($ref->location)
                        <div>
                            <div class="cref-meta-label">Lokasyon</div>
                            <div class="cref-meta-value">{{ $ref->location }}</div>
                        </div>
                        @endif
                    </div>

                    @if($ref->description)
                    <p style="font-size:13px;color:#666;line-height:1.7;border-left:3px solid #1B3A6B;padding-left:12px;margin-bottom:16px;">{{ $ref->description }}</p>
                    @endif

                    <div class="cref-media-grid">
                        @foreach($mediaItems as $media)
                        @if($media['type']==='video')
                        @php
                            preg_match('/embed\/([a-zA-Z0-9_-]+)/', $media['src'], $m);
                            $vid = $m[1] ?? '';
                            $thumb = 'https://img.youtube.com/vi/' . $vid . '/hqdefault.jpg';
                            $embedSrc = 'https://www.youtube.com/embed/' . $vid . '?rel=0&modestbranding=1&autoplay=1';
                        @endphp
                        <div class="cref-media-item yt-thumb-wrap" data-src="{{ $embedSrc }}" onclick="playYT(this)" style="cursor:pointer;">
                            <img src="{{ $thumb }}" alt="Video" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;">
                            <div class="yt-play-btn">
                                <svg viewBox="0 0 68 48" width="56" height="40"><path d="M66.5 7.7c-.8-2.9-3-5.2-5.9-6C55.8 0 34 0 34 0S12.2 0 7.4 1.7c-2.9.8-5.1 3.1-5.9 6C0 12.5 0 24 0 24s0 11.5 1.5 16.3c.8 2.9 3 5.2 5.9 6C12.2 48 34 48 34 48s21.8 0 26.6-1.7c2.9-.8 5.1-3.1 5.9-6C68 35.5 68 24 68 24s0-11.5-1.5-16.3z" fill="#ff0000"/><path d="M45 24 27 14v20" fill="#fff"/></svg>
                            </div>
                            <div class="cref-video-badge"><i class="fa fa-youtube-play"></i> Video</div>
                        </div>
                        @else
                        <div class="cref-media-item">
                                @php
                                    $src = str_starts_with($media['src'],'assets/') ? asset($media['src']) : asset('storage/'.$media['src']);
                                @endphp
                                <img src="{{ $src }}" alt="Proje görseli" loading="lazy">
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>
            @endforeach
            </div>

            <div id="crefEmpty" style="display:none;text-align:center;padding:40px 0;color:#bbb;font-family:'Rajdhani',sans-serif;font-size:13px;text-transform:uppercase;letter-spacing:2px;">
                Bu filtreye uygun referans bulunamadı.
            </div>

            <div id="crefPagination" class="cref-pagination"></div>

            <div style="margin-top:24px;">
                <a href="/referanslar" style="display:inline-flex;align-items:center;gap:8px;font-size:12px;text-transform:uppercase;letter-spacing:2px;font-weight:600;color:#1a1a1a;font-family:'Rajdhani',sans-serif;text-decoration:none;border-bottom:2px solid #1B3A6B;padding-bottom:2px;">
                    Tüm Referanslar <i class="fa fa-arrow-right" style="font-size:10px;"></i>
                </a>
            </div>

        </div>
    </div>

    <script>
    function playYT(el) {
        var src = el.dataset.src;
        el.innerHTML = '<iframe src="' + src + '" allowfullscreen allow="autoplay; encrypted-media"></iframe>';
        el.onclick = null;
        el.style.cursor = 'default';
    }

    function toggleCref(trigger) {
        var item   = trigger.closest('.cref-item');
        var isOpen = item.classList.contains('is-open');
        document.querySelectorAll('.cref-item.is-open').forEach(function(el){ el.classList.remove('is-open'); });
        if (!isOpen) item.classList.add('is-open');
    }

    (function(){
        var PER_PAGE  = 20;
        var btns      = document.querySelectorAll('.cref-filter-btn');
        var allItems  = Array.from(document.querySelectorAll('.cref-item'));
        var empty     = document.getElementById('crefEmpty');
        var pagEl     = document.getElementById('crefPagination');
        var curFilter = 'all';
        var curPage   = 1;

        function filtered() {
            return allItems.filter(function(item){
                return curFilter === 'all' || item.dataset.status === curFilter;
            });
        }

        function render() {
            var items   = filtered();
            var total   = items.length;
            var pages   = Math.ceil(total / PER_PAGE);
            var start   = (curPage - 1) * PER_PAGE;
            var end     = start + PER_PAGE;

            allItems.forEach(function(item){ item.style.display = 'none'; item.classList.remove('is-open'); });
            items.slice(start, end).forEach(function(item){ item.style.display = ''; });
            empty.style.display = total === 0 ? 'block' : 'none';

            /* pagination buttons */
            pagEl.innerHTML = '';
            if (pages <= 1) return;

            function mkBtn(label, page, disabled) {
                var b = document.createElement('button');
                b.className = 'cref-page-btn' + (page === curPage ? ' active' : '');
                b.textContent = label;
                b.disabled = !!disabled;
                b.addEventListener('click', function(){
                    curPage = page;
                    render();
                    document.getElementById('crefList').scrollIntoView({behavior:'smooth', block:'start'});
                });
                pagEl.appendChild(b);
            }

            mkBtn('‹', Math.max(1, curPage - 1), curPage === 1);
            for (var p = 1; p <= pages; p++) {
                if (pages > 7 && p > 2 && p < pages - 1 && Math.abs(p - curPage) > 1) {
                    if (p === 3 || p === pages - 2) { var dots = document.createElement('span'); dots.textContent = '…'; dots.style.cssText='padding:0 4px;color:#aaa;align-self:center;'; pagEl.appendChild(dots); }
                    continue;
                }
                mkBtn(p, p);
            }
            mkBtn('›', Math.min(pages, curPage + 1), curPage === pages);
        }

        btns.forEach(function(btn){
            btn.addEventListener('click', function(){
                btns.forEach(function(b){ b.classList.remove('active'); });
                btn.classList.add('active');
                curFilter = btn.dataset.filter;
                curPage   = 1;
                render();
            });
        });

        render();
    })();
    </script>
    @endif
    <!--====================  End References ====================-->

    <!--====================  Other companies ====================-->
    <div class="space__top--r120 space__bottom--r120" style="background:#f8f7f4;">
        <div class="container" style="padding-top:80px; padding-bottom:80px;">
            <h4 style="font-size:13px; text-transform:uppercase; letter-spacing:3px; color:#999; margin-bottom:8px; font-family:'Rajdhani',sans-serif; text-align:center;">Karaçavuş Şirketler Grubu</h4>
            <h3 style="font-size:28px; font-weight:700; color:#1a1a1a; text-align:center; margin-bottom:48px; font-family:'Rajdhani',sans-serif;">Diğer Şirketlerimiz</h3>

            <div class="row">
                @foreach($others as $other)
                <div class="col-lg-3 col-md-6 space__bottom--30">
                    <a href="{{ route('company.show', $other->slug) }}" style="display:block; text-decoration:none; background:#fff; border:1px solid #e5e5e5; padding:30px 24px; border-radius:2px; transition:box-shadow .25s;" class="other-company-card">
                        <div style="width:48px; height:48px; background:#1a1a1a; border-radius:2px; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
                            <i class="{{ $other->icon }}" style="font-size:22px; color:#1B3A6B;"></i>
                        </div>
                        <span style="display:block; font-size:10px; text-transform:uppercase; letter-spacing:2px; color:#1B3A6B; margin-bottom:8px; font-family:'Rajdhani',sans-serif;">{{ $other->sector }}</span>
                        <h5 style="font-size:14px; font-weight:700; color:#1a1a1a; margin:0 0 12px; line-height:1.4; font-family:'Rajdhani',sans-serif; text-transform:uppercase;">{{ $other->short }}</h5>
                        <span style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#1B3A6B; font-family:'Rajdhani',sans-serif;">İncele →</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--====================  End other companies  ====================-->

    <style>
        .other-company-card:hover { box-shadow: 0 8px 32px rgba(0,0,0,.08); }
        .other-company-card:hover h5 { color: #1B3A6B; }
        .ref-list-row:hover { background:#fafaf8; padding-left:8px; }
    </style>

    <!--====================  CTA area ====================-->
    <div class="bg-img space__inner--ry80" data-bg="{{ asset('assets/img/backgrounds/cta-bg.webp') }}" style="background-size:cover; background-position:center;">
        <div style="background:rgba(0,0,0,0.65); padding:60px 0;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 space__bottom__md--30 space__bottom__lm--30">
                        <h3 style="font-size:38px; font-weight:700; color:#fff; font-family:'Rajdhani',sans-serif; margin:0 0 12px; text-transform:uppercase;">
                            İş Birliği <span style="color:#1B3A6B;">Yapalım</span>
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
    <div class="brand-logo-area" style="padding:40px 0;">
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
