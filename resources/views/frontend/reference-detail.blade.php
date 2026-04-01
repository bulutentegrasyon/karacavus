@extends('layouts.frontend')

@section('title', $reference->name . ' | Referanslar | Karaçavuş Şirketler Grubu')

@section('content')

<style>
.ref-detail-hero {
    position:relative; height:340px; overflow:hidden; border-radius:2px;
    background:#1a1a1a; margin-bottom:40px;
}
.ref-detail-hero img { width:100%; height:100%; object-fit:cover; opacity:.7; }
.ref-detail-hero-overlay {
    position:absolute; inset:0; display:flex; flex-direction:column;
    justify-content:flex-end; padding:40px;
    background:linear-gradient(to top, rgba(0,0,0,.8) 0%, transparent 60%);
}

.ref-info-grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; }
@media(max-width:576px){ .ref-info-grid { grid-template-columns:1fr; } }
.ref-info-item { border:1px solid #f0f0f0; padding:20px; border-radius:2px; }
.ref-info-label { font-size:10px; text-transform:uppercase; letter-spacing:2px; color:#aaa; font-family:'Rajdhani',sans-serif; margin-bottom:6px; }
.ref-info-value { font-size:15px; font-weight:700; color:#1a1a1a; font-family:'Rajdhani',sans-serif; }

.gallery-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; }
@media(max-width:768px){ .gallery-grid { grid-template-columns:repeat(2,1fr); } }
@media(max-width:480px){ .gallery-grid { grid-template-columns:1fr 1fr; } }
.gallery-item { position:relative; overflow:hidden; border-radius:2px; aspect-ratio:4/3; cursor:pointer; background:#f5f5f5; }
.gallery-item img { width:100%; height:100%; object-fit:cover; transition:transform .4s; }
.gallery-item:hover img { transform:scale(1.05); }
.gallery-item-overlay {
    position:absolute; inset:0; background:rgba(0,0,0,.35);
    display:flex; align-items:center; justify-content:center;
    opacity:0; transition:opacity .3s;
}
.gallery-item:hover .gallery-item-overlay { opacity:1; }

/* Lightbox */
.lightbox-overlay {
    position:fixed; inset:0; background:rgba(0,0,0,.92); z-index:9999;
    display:none; align-items:center; justify-content:center;
}
.lightbox-overlay.open { display:flex; }
.lightbox-img { max-width:90vw; max-height:85vh; border-radius:2px; }
.lightbox-close {
    position:absolute; top:24px; right:32px; font-size:32px; color:#fff;
    cursor:pointer; line-height:1; background:none; border:none;
}
.lightbox-nav {
    position:absolute; top:50%; transform:translateY(-50%);
    background:rgba(255,255,255,.12); border:none; color:#fff;
    font-size:24px; padding:16px 20px; cursor:pointer; border-radius:2px;
}
.lightbox-prev { left:20px; }
.lightbox-next { right:20px; }

.no-gallery {
    border:2px dashed #e0e0e0; padding:60px 24px; text-align:center;
    color:#bbb; border-radius:2px; font-family:'Rajdhani',sans-serif;
    font-size:13px; text-transform:uppercase; letter-spacing:2px;
}
</style>

{{-- Breadcrumb --}}
<div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-breadcrumb-content text-center">
                    <h1>Referans Detayı</h1>
                    <ul class="page-breadcrumb-links">
                        <li><a href="/">Ana Sayfa</a></li>
                        <li><a href="/referanslar">Referanslar</a></li>
                        <li>{{ Str::limit($reference->name, 40) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space__top--r120 space__bottom--r120">
    <div class="container">
        <div class="row">

            {{-- Sol: Bilgiler --}}
            <div class="col-lg-5 mb-5">

                {{-- Cover image --}}
                <div class="ref-detail-hero">
                    <img src="{{ $reference->cover_url }}" alt="{{ $reference->name }}">
                    <div class="ref-detail-hero-overlay">
                        <span style="font-size:10px;text-transform:uppercase;letter-spacing:3px;color:#1B3A6B;font-family:'Rajdhani',sans-serif;margin-bottom:8px;">{{ $reference->work_type }}</span>
                        <h2 style="font-size:20px;font-weight:700;color:#fff;font-family:'Rajdhani',sans-serif;text-transform:uppercase;line-height:1.3;margin:0;">{{ $reference->name }}</h2>
                    </div>
                </div>

                {{-- Info grid --}}
                <div class="ref-info-grid mb-4">
                    <div class="ref-info-item">
                        <div class="ref-info-label"><i class="fa fa-cube" style="color:#1B3A6B;margin-right:4px;"></i> İş Miktarı</div>
                        <div class="ref-info-value">{{ $reference->quantity ?? '—' }}</div>
                    </div>
                    <div class="ref-info-item">
                        <div class="ref-info-label"><i class="fa fa-flag" style="color:#1B3A6B;margin-right:4px;"></i> Durum</div>
                        <div class="ref-info-value">
                            <span style="padding:4px 12px;border-radius:2px;font-size:12px;
                                background:{{ $reference->status==='tamamlanan' ? '#e8f5e9' : '#e8f0fb' }};
                                color:{{ $reference->status==='tamamlanan' ? '#388e3c' : '#1B3A6B' }};">
                                {{ $reference->status_label }}
                            </span>
                        </div>
                    </div>
                    <div class="ref-info-item">
                        <div class="ref-info-label"><i class="fa fa-building" style="color:#1B3A6B;margin-right:4px;"></i> Uygulayan Şirket</div>
                        <div class="ref-info-value">{{ $reference->company }}</div>
                    </div>
                    <div class="ref-info-item">
                        <div class="ref-info-label"><i class="fa fa-wrench" style="color:#1B3A6B;margin-right:4px;"></i> İş Türü</div>
                        <div class="ref-info-value">{{ $reference->work_type }}</div>
                    </div>
                    @if($reference->location)
                    <div class="ref-info-item" style="grid-column:span 2;">
                        <div class="ref-info-label"><i class="fa fa-map-marker" style="color:#1B3A6B;margin-right:4px;"></i> Lokasyon</div>
                        <div class="ref-info-value">{{ $reference->location }}</div>
                    </div>
                    @endif
                </div>

                {{-- Description --}}
                @if($reference->description)
                <div style="border-left:4px solid #1B3A6B;padding:20px 24px;background:#fafaf8;">
                    <p style="font-size:15px;color:#555;line-height:1.8;margin:0;">{{ $reference->description }}</p>
                </div>
                @endif

                {{-- Back --}}
                <div style="margin-top:28px;">
                    <a href="/referanslar" style="display:inline-flex;align-items:center;gap:8px;font-size:12px;text-transform:uppercase;letter-spacing:2px;font-weight:600;color:#1a1a1a;font-family:'Rajdhani',sans-serif;text-decoration:none;border-bottom:2px solid #1B3A6B;padding-bottom:2px;">
                        <i class="fa fa-arrow-left" style="font-size:10px;"></i> Tüm Referanslar
                    </a>
                </div>
            </div>

            {{-- Sağ: Galeri --}}
            <div class="col-lg-6 offset-lg-1 mb-5">
                <span style="font-size:11px;text-transform:uppercase;letter-spacing:3px;color:#1B3A6B;font-family:'Rajdhani',sans-serif;">Proje Görselleri</span>
                <div style="width:48px;height:3px;background:#1B3A6B;margin:10px 0 28px;"></div>

                @php $gallery = $reference->gallery ?? []; @endphp

                @if(count($gallery) > 0)
                <div class="gallery-grid" id="galleryGrid">
                    @foreach($gallery as $i => $img)
                    <div class="gallery-item" onclick="openLightbox({{ $i }})">
                        <img src="{{ str_starts_with($img,'assets/') ? asset($img) : asset('storage/'.$img) }}" alt="Proje görseli {{ $i+1 }}">
                        <div class="gallery-item-overlay">
                            <i class="fa fa-search-plus" style="color:#fff;font-size:22px;"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="no-gallery">
                    <i class="fa fa-image" style="font-size:36px;display:block;margin-bottom:16px;opacity:.4;"></i>
                    Bu referansa ait görsel henüz eklenmemiştir.
                </div>
                @endif
            </div>

        </div>

        {{-- Diğer Referanslar --}}
        @if($others->count() > 0)
        <div style="margin-top:60px;padding-top:60px;border-top:1px solid #f0f0f0;">
            <h4 style="font-size:13px;text-transform:uppercase;letter-spacing:3px;color:#999;margin-bottom:32px;font-family:'Rajdhani',sans-serif;">Diğer Referanslarımız</h4>
            <div class="row">
                @foreach($others as $other)
                <div class="col-lg-3 col-md-4 col-6 mb-3">
                    <a href="/referanslar/{{ $other->slug }}" style="display:flex;align-items:center;gap:10px;padding:14px;border:1px solid #e5e5e5;background:#fff;border-radius:2px;text-decoration:none;color:#1a1a1a;transition:border-color .25s;">
                        <div style="width:36px;height:36px;background:#e8f0fb;border-radius:2px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa fa-hard-hat" style="font-size:14px;color:#1B3A6B;"></i>
                        </div>
                        <span style="font-size:11px;font-weight:600;font-family:'Rajdhani',sans-serif;text-transform:uppercase;line-height:1.3;">{{ Str::limit($other->name, 35) }}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

{{-- Lightbox --}}
<div class="lightbox-overlay" id="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()">×</button>
    <button class="lightbox-nav lightbox-prev" onclick="navLightbox(-1)"><i class="fa fa-chevron-left"></i></button>
    <img class="lightbox-img" id="lightboxImg" src="" alt="">
    <button class="lightbox-nav lightbox-next" onclick="navLightbox(1)"><i class="fa fa-chevron-right"></i></button>
</div>

<script>
var gallery = @json($gallery);
var current = 0;

function getUrl(img){ return img.startsWith('assets/') ? '/'+img : '/storage/'+img; }

function openLightbox(i){
    if(!gallery.length) return;
    current = i;
    document.getElementById('lightboxImg').src = getUrl(gallery[i]);
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow='hidden';
}
function closeLightbox(){
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow='';
}
function navLightbox(dir){
    current = (current + dir + gallery.length) % gallery.length;
    document.getElementById('lightboxImg').src = getUrl(gallery[current]);
}
document.getElementById('lightbox').addEventListener('click', function(e){
    if(e.target === this) closeLightbox();
});
document.addEventListener('keydown', function(e){
    if(e.key==='Escape') closeLightbox();
    if(e.key==='ArrowLeft') navLightbox(-1);
    if(e.key==='ArrowRight') navLightbox(1);
});
</script>

@endsection
