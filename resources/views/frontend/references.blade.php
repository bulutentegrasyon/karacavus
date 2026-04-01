@extends('layouts.frontend')

@section('title', 'Referanslar | Karaçavuş Şirketler Grubu')

@section('content')

<style>
.ref-filter-bar { display:flex; gap:8px; flex-wrap:wrap; margin-bottom:48px; }
.ref-filter-btn {
    padding:9px 24px; font-size:11px; text-transform:uppercase; letter-spacing:2px;
    font-family:'Rajdhani',sans-serif; font-weight:700; border:2px solid #e0e0e0;
    background:#fff; color:#888; cursor:pointer; transition:.2s; border-radius:2px;
}
.ref-filter-btn.active, .ref-filter-btn:hover { border-color:#1B3A6B; color:#1B3A6B; }
.ref-filter-btn.active { background:#1B3A6B; color:#fff; }

.ref-card {
    background:#fff; border:1px solid #efefef; border-radius:2px;
    padding:28px 24px 22px; transition:box-shadow .25s, border-color .25s;
    display:flex; flex-direction:column; height:100%; cursor:pointer;
    text-decoration:none; color:inherit;
}
.ref-card:hover { box-shadow:0 8px 32px rgba(0,0,0,.08); border-color:#1B3A6B; }

.ref-num {
    font-size:11px; font-family:'Rajdhani',sans-serif; letter-spacing:2px;
    color:#1B3A6B; font-weight:700; text-transform:uppercase; margin-bottom:10px;
}
.ref-name {
    font-size:14px; font-weight:700; color:#1a1a1a; font-family:'Rajdhani',sans-serif;
    text-transform:uppercase; line-height:1.4; margin-bottom:16px; flex:1;
}
.ref-meta { display:flex; flex-direction:column; gap:8px; margin-top:auto; padding-top:16px; border-top:1px solid #f0f0f0; }
.ref-meta-row { display:flex; align-items:center; gap:8px; font-size:12px; color:#666; }
.ref-meta-icon { width:18px; text-align:center; color:#1B3A6B; font-size:11px; flex-shrink:0; }
.ref-status {
    display:inline-block; font-size:10px; letter-spacing:1.5px; text-transform:uppercase;
    font-family:'Rajdhani',sans-serif; font-weight:700; padding:3px 10px; border-radius:2px;
}
.ref-status.tamamlanan { background:#e8f5e9; color:#388e3c; }
.ref-status.devam_eden { background:#e8f0fb;color:#1B3A6B; }

.ref-stats { display:flex; gap:40px; margin-bottom:48px; flex-wrap:wrap; }
.ref-stat { text-align:center; }
.ref-stat-num { font-size:40px; font-weight:700; font-family:'Rajdhani',sans-serif; color:#1B3A6B; line-height:1; }
.ref-stat-label { font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#999; font-family:'Rajdhani',sans-serif; margin-top:4px; }

.ref-search {
    width:100%; max-width:400px; border:1px solid #e0e0e0; padding:10px 16px;
    font-size:13px; border-radius:2px; outline:none; margin-bottom:40px;
    font-family:'Rajdhani',sans-serif;
}
.ref-search:focus { border-color:#1B3A6B; }

.ref-empty { text-align:center; padding:60px 0; color:#aaa; font-family:'Rajdhani',sans-serif; font-size:14px; text-transform:uppercase; letter-spacing:2px; }
</style>

{{-- Breadcrumb --}}
<div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-breadcrumb-content text-center">
                    <h1>Referanslarımız</h1>
                    <ul class="page-breadcrumb-links">
                        <li><a href="/">Ana Sayfa</a></li>
                        <li>Referanslar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Main --}}
<div class="space__top--r120 space__bottom--r120">
    <div class="container">

        {{-- Başlık --}}
        <div class="row mb-5">
            <div class="col-lg-8">
                <span style="font-size:11px;text-transform:uppercase;letter-spacing:3px;color:#1B3A6B;font-family:'Rajdhani',sans-serif;">Karaçavuş Şirketler Grubu</span>
                <div style="width:48px;height:3px;background:#1B3A6B;margin:10px 0 16px;"></div>
                <h2 style="font-size:30px;font-weight:700;color:#1a1a1a;font-family:'Rajdhani',sans-serif;text-transform:uppercase;">Tamamladığımız ve Devam Eden Projeler</h2>
                <p style="color:#777;font-size:15px;line-height:1.8;margin-top:12px;">Yıllar içinde Türkiye'nin önde gelen inşaat, altyapı ve konut projelerinde gerçekleştirdiğimiz hafriyat çalışmalarından bir kesit.</p>
            </div>
        </div>

        {{-- İstatistikler --}}
        @php
            $total      = $references->count();
            $tamamlanan = $references->where('status','tamamlanan')->count();
            $devam      = $references->where('status','devam_eden')->count();
            $totalM3    = $references->sum(function($r){ return (float) str_replace(['.','m³',' '],['','',''], $r->quantity); });
        @endphp
        <div class="ref-stats">
            <div class="ref-stat"><div class="ref-stat-num">{{ $total }}</div><div class="ref-stat-label">Toplam Referans</div></div>
            <div class="ref-stat"><div class="ref-stat-num">{{ $tamamlanan }}</div><div class="ref-stat-label">Tamamlanan</div></div>
            <div class="ref-stat"><div class="ref-stat-num">{{ $devam }}</div><div class="ref-stat-label">Devam Eden</div></div>
            <div class="ref-stat"><div class="ref-stat-num">{{ number_format($totalM3/1000000, 1) }}M</div><div class="ref-stat-label">Toplam m³</div></div>
        </div>

        {{-- Filtre + Arama --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <div class="ref-filter-bar mb-0">
                <button class="ref-filter-btn active" data-filter="all">Tümü <span style="font-size:10px;opacity:.7;">({{ $total }})</span></button>
                <button class="ref-filter-btn" data-filter="tamamlanan">Tamamlanan <span style="font-size:10px;opacity:.7;">({{ $tamamlanan }})</span></button>
                <button class="ref-filter-btn" data-filter="devam_eden">Devam Eden <span style="font-size:10px;opacity:.7;">({{ $devam }})</span></button>
            </div>
            <input type="search" class="ref-search mb-0" id="refSearch" placeholder="Firma adı ara...">
        </div>

        {{-- Grid --}}
        <div class="row" id="refGrid">
            @foreach($references as $i => $ref)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4 ref-item" data-status="{{ $ref->status }}" data-name="{{ strtolower($ref->name) }}">
                <a href="/referanslar/{{ $ref->slug }}" class="ref-card">
                    <div class="ref-num">#{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="ref-name">{{ $ref->name }}</div>
                    <div class="ref-meta">
                        <div class="ref-meta-row">
                            <span class="ref-meta-icon"><i class="fa fa-cube"></i></span>
                            <span><strong>{{ $ref->quantity }}</strong></span>
                        </div>
                        <div class="ref-meta-row">
                            <span class="ref-meta-icon"><i class="fa fa-building"></i></span>
                            <span>{{ $ref->company }}</span>
                        </div>
                        <div class="ref-meta-row">
                            <span class="ref-meta-icon"><i class="fa fa-wrench"></i></span>
                            <span>{{ $ref->work_type }}</span>
                        </div>
                        <div class="mt-2">
                            <span class="ref-status {{ $ref->status }}">{{ $ref->status_label }}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="ref-empty d-none" id="refEmpty">Bu filtreye uygun referans bulunamadı.</div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const btns  = document.querySelectorAll('.ref-filter-btn');
    const items = document.querySelectorAll('.ref-item');
    const search = document.getElementById('refSearch');
    const empty  = document.getElementById('refEmpty');
    let activeFilter = 'all';

    function applyFilters(){
        const q = search.value.trim().toLowerCase();
        let visible = 0;
        items.forEach(function(item){
            const matchStatus = activeFilter === 'all' || item.dataset.status === activeFilter;
            const matchSearch = !q || item.dataset.name.includes(q);
            if(matchStatus && matchSearch){ item.classList.remove('d-none'); visible++; }
            else item.classList.add('d-none');
        });
        empty.classList.toggle('d-none', visible > 0);
    }

    btns.forEach(function(btn){
        btn.addEventListener('click', function(){
            btns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeFilter = btn.dataset.filter;
            applyFilters();
        });
    });

    search.addEventListener('input', applyFilters);
});
</script>

@endsection
