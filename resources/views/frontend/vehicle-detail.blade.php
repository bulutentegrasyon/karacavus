@extends('layouts.frontend')

@section('title', $vehicle->name . ' | Ömkar Otomotiv')

@section('content')

<style>
.vd-hero {
    background: #f8f7f4;
    padding: 80px 0 60px;
    border-bottom: 1px solid #ececec;
}
.vd-badge {
    display: inline-block; font-size: 11px; text-transform: uppercase; letter-spacing: 3px;
    color: #1B3A6B; font-family: 'Rajdhani', sans-serif; font-weight: 700; margin-bottom: 14px;
}
.vd-title {
    font-size: 36px; font-weight: 700; color: #1a1a1a; font-family: 'Rajdhani', sans-serif;
    text-transform: uppercase; line-height: 1.2; margin-bottom: 8px;
}
.vd-meta-bar {
    display: flex; flex-wrap: wrap; gap: 24px; margin-top: 32px;
}
.vd-meta-item {
    display: flex; flex-direction: column;
}
.vd-meta-label {
    font-size: 10px; text-transform: uppercase; letter-spacing: 2px; color: #aaa;
    font-family: 'Rajdhani', sans-serif; margin-bottom: 4px;
}
.vd-meta-value {
    font-size: 16px; font-weight: 700; color: #1a1a1a; font-family: 'Rajdhani', sans-serif;
}
.vd-cta-btn {
    display: inline-flex; align-items: center; gap: 12px;
    background: #1B3A6B; color: #fff; padding: 16px 32px;
    font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;
    font-family: 'Rajdhani', sans-serif; text-decoration: none; border-radius: 2px;
    transition: background .2s;
}
.vd-cta-btn:hover { background: #15305a; color: #fff; }
.vd-back {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 11px; text-transform: uppercase; letter-spacing: 2px; font-weight: 600;
    color: #555; font-family: 'Rajdhani', sans-serif; text-decoration: none;
    margin-bottom: 32px; transition: color .2s;
}
.vd-back:hover { color: #1B3A6B; }
.vd-info-card {
    background: #fff; border: 1px solid #ececec; border-radius: 2px; padding: 32px;
}
.vd-divider { width: 48px; height: 3px; background: #1B3A6B; margin: 10px 0 24px; }
</style>

{{-- Breadcrumb --}}
<div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-breadcrumb-content text-center">
                    <h1>{{ $vehicle->name }}</h1>
                    <ul class="page-breadcrumb-links">
                        <li><a href="/">Ana Sayfa</a></li>
                        <li><a href="{{ route('companies') }}">Şirketlerimiz</a></li>
                        <li><a href="{{ route('company.show', 'omkar-insaat-hafriyat') }}">Ömkar Otomotiv</a></li>
                        <li>{{ $vehicle->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space__top--r120 space__bottom--r120">
    <div class="container">

        <a href="{{ route('company.show', 'omkar-insaat-hafriyat') }}" class="vd-back">
            <i class="fa fa-arrow-left" style="font-size:10px;"></i> Ömkar Otomotiv'e Dön
        </a>

        <div class="row">
            <div class="col-lg-8">
                <div class="vd-info-card">

                    @if($vehicle->cover_image)
                    @php $coverSrc = str_starts_with($vehicle->cover_image, 'http') ? $vehicle->cover_image : asset('storage/'.$vehicle->cover_image); @endphp
                    <div style="width:100%;aspect-ratio:16/9;border-radius:2px;overflow:hidden;margin-bottom:28px;background:#1B3A6B;">
                        <img src="{{ $coverSrc }}" alt="{{ $vehicle->name }}" style="width:100%;height:100%;object-fit:cover;display:block;">
                    </div>
                    @else
                    <div style="width:100%;aspect-ratio:16/9;border-radius:2px;overflow:hidden;margin-bottom:28px;background:#1B3A6B;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px;">
                        <i class="fa fa-car" style="font-size:48px;color:rgba(255,255,255,.3);"></i>
                        <span style="font-size:13px;font-family:'Rajdhani',sans-serif;font-weight:700;color:rgba(255,255,255,.4);text-transform:uppercase;letter-spacing:3px;">{{ strtoupper($vehicle->brand ?? 'Ömkar Otomotiv') }}</span>
                    </div>
                    @endif

                    <span class="vd-badge">{{ $vehicle->category_label }}</span>
                    <div class="vd-divider"></div>

                    <h1 class="vd-title">{{ $vehicle->name }}</h1>

                    <div class="vd-meta-bar">
                        @if($vehicle->brand)
                        <div class="vd-meta-item">
                            <span class="vd-meta-label">Marka</span>
                            <span class="vd-meta-value">{{ ucfirst($vehicle->brand) }}</span>
                        </div>
                        @endif
                        @if($vehicle->year)
                        <div class="vd-meta-item">
                            <span class="vd-meta-label">Model Yılı</span>
                            <span class="vd-meta-value">{{ $vehicle->year }}</span>
                        </div>
                        @endif
                        @if($vehicle->vehicle_type)
                        <div class="vd-meta-item">
                            <span class="vd-meta-label">Araç Tipi</span>
                            <span class="vd-meta-value" style="text-transform:capitalize;">{{ $vehicle->vehicle_type }}</span>
                        </div>
                        @endif
                        @if($vehicle->price)
                        <div class="vd-meta-item">
                            <span class="vd-meta-label">Fiyat</span>
                            <span class="vd-meta-value" style="color:#1B3A6B;">{{ $vehicle->price }}</span>
                        </div>
                        @endif
                        @if($vehicle->km)
                        <div class="vd-meta-item">
                            <span class="vd-meta-label">Kilometre</span>
                            <span class="vd-meta-value">{{ number_format($vehicle->km) }} km</span>
                        </div>
                        @endif
                        <div class="vd-meta-item">
                            <span class="vd-meta-label">Firma</span>
                            <span class="vd-meta-value">Ömkar Otomotiv</span>
                        </div>
                    </div>

                    @if($vehicle->sahibinden_url)
                    <div style="margin-top: 40px; padding-top: 32px; border-top: 1px solid #f0f0f0;">
                        <p style="font-size:13px; color:#888; margin-bottom:20px; font-family:'Rajdhani',sans-serif;">
                            Bu araç hakkında detaylı bilgi, fiyat ve iletişim için Sahibinden.com ilanını inceleyebilirsiniz.
                        </p>
                        <a href="{{ $vehicle->sahibinden_url }}" target="_blank" rel="noopener" class="vd-cta-btn">
                            <i class="fa fa-external-link"></i>
                            Sahibinden'de İncele
                        </a>
                    </div>
                    @endif

                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div style="background:#1B3A6B; color:#fff; padding:32px; border-radius:2px;">
                    <div style="width:48px;height:48px;background:rgba(255,255,255,.1);border-radius:2px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                        <i class="flaticon-006-truck" style="font-size:24px;color:#fff;"></i>
                    </div>
                    <h5 style="font-size:16px;font-weight:700;font-family:'Rajdhani',sans-serif;text-transform:uppercase;margin-bottom:8px;">Ömkar Otomotiv</h5>
                    <p style="font-size:12px;color:rgba(255,255,255,.7);line-height:1.7;margin-bottom:24px;font-family:'Rajdhani',sans-serif;">
                        Otomotiv, kamuflaj ve lojistik sektörlerinde hizmet veren Ömkar Otomotiv'in araç satış portföyü.
                    </p>
                    <a href="{{ route('company.show', 'omkar-insaat-hafriyat') }}" style="display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:2px;color:#fff;text-decoration:none;border-bottom:1px solid rgba(255,255,255,.4);padding-bottom:2px;font-family:'Rajdhani',sans-serif;">
                        Tüm Araçlar <i class="fa fa-arrow-right" style="font-size:10px;"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
