@extends('adminlte::page')

@section('title', 'Araç Düzenle')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Araç Düzenle</h1>
        <a href="{{ route('admin.vehicles.index', ['category' => $vehicle->category]) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
{{-- Bookmarklet Yardım Modalı --}}
<div id="bookmarkletModal" style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,.6);align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:8px;padding:32px;max-width:480px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,.3);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
            <h5 style="margin:0;font-weight:700;"><i class="fas fa-magic text-primary mr-2"></i> Sahibinden Görsel Çekici</h5>
            <button type="button" id="btnCloseBookmarklet" style="background:none;border:none;font-size:20px;cursor:pointer;color:#aaa;">&times;</button>
        </div>

        <div class="alert alert-info py-2" style="font-size:13px;">
            <i class="fas fa-spinner fa-spin mr-1"></i> Sahibinden sayfası açıldı — bookmarklet'e tıklayın.
        </div>

        <p style="font-size:13px;color:#555;margin-bottom:16px;line-height:1.6;">
            <strong>İlk kez kullanıyorsanız:</strong> Aşağıdaki butonu yer imine sürükleyin. Sonra sahibinden sayfasında tıklayın.
        </p>

        <div style="text-align:center;margin-bottom:20px;">
            <a id="bookmarkletLink" href="#"
               style="display:inline-block;background:#1B3A6B;color:#fff;padding:12px 24px;border-radius:4px;font-weight:700;text-decoration:none;font-size:14px;cursor:move;"
               title="Bu butonu yer imine sürükleyin">
                <i class="fas fa-bookmark mr-2"></i> Sahibinden Görsel Çekici
            </a>
            <p style="font-size:11px;color:#aaa;margin-top:8px;">↑ Yer imine sürükleyin (bir kez yeterli)</p>
        </div>

        <hr>
        <p style="font-size:12px;color:#777;margin-bottom:12px;"><strong>Zaten eklediyseniz:</strong> Açılan Sahibinden sekmesinde yer imindeki butona tıklayın. Görsel otomatik buraya gelecek.</p>

        <div style="text-align:center;">
            <div class="spinner-border spinner-border-sm text-primary mr-2"></div>
            <span style="font-size:13px;color:#888;">Bookmarklet'ten görsel bekleniyor...</span>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.vehicles.update', $vehicle) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="row">

        {{-- Sol kolon --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Araç Bilgileri</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Araç Adı <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $vehicle->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Marka</label>
                                <input type="text" name="brand" class="form-control"
                                       value="{{ old('brand', $vehicle->brand) }}" placeholder="mercedes, ford...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Model Yılı</label>
                                <input type="text" name="year" class="form-control"
                                       value="{{ old('year', $vehicle->year) }}" placeholder="2023">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fiyat</label>
                                <input type="text" name="price" class="form-control"
                                       value="{{ old('price', $vehicle->price) }}" placeholder="1.250.000 TL">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>KM</label>
                                <input type="number" name="km" class="form-control"
                                       value="{{ old('km', $vehicle->km) }}" placeholder="125000">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Araç Tipi</label>
                                <input type="text" name="vehicle_type" class="form-control"
                                       value="{{ old('vehicle_type', $vehicle->vehicle_type) }}" placeholder="kamyon, çekici...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sahibinden.com İlan URL'i</label>
                        <div class="input-group">
                            <input type="url" name="sahibinden_url" id="sahibinden_url"
                                   class="form-control @error('sahibinden_url') is-invalid @enderror"
                                   value="{{ old('sahibinden_url', $vehicle->sahibinden_url) }}"
                                   placeholder="https://www.sahibinden.com/ilan/...">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-primary" id="btnFetchImage" title="Sahibinden'i aç, bookmarklet ile görseli çek">
                                    <i class="fas fa-magic mr-1"></i> Görseli Çek
                                </button>
                                <button type="button" class="btn btn-outline-secondary" id="btnCheckStatus" title="İlan hâlâ aktif mi?">
                                    <i class="fas fa-sync-alt mr-1"></i> Kontrol Et
                                </button>
                                @if($vehicle->sahibinden_url)
                                <a href="{{ $vehicle->sahibinden_url }}" target="_blank" class="btn btn-outline-info" title="İlanı aç">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                        @error('sahibinden_url')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        <div id="statusBadge" class="mt-1"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sağ kolon --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Ayarlar</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select name="category" class="form-control" required>
                            @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ old('category', $vehicle->category) === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sıralama</label>
                        <input type="number" name="order" class="form-control"
                               value="{{ old('order', $vehicle->order) }}" min="0">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="custom-control-input" id="is_active"
                                   name="is_active" value="1" {{ old('is_active', $vehicle->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Aktif (Sitede göster)</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-save mr-1"></i> Güncelle
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3 class="card-title">Kapak Görseli</h3></div>
                <div class="card-body">
                    @if($vehicle->cover_image)
                    <div class="mb-2">
                        <img src="{{ str_starts_with($vehicle->cover_image,'http') ? $vehicle->cover_image : asset('storage/'.$vehicle->cover_image) }}"
                             class="img-fluid rounded" style="max-height:160px;width:100%;object-fit:cover;">
                    </div>
                    @endif
                    {{-- Otomatik çekilen veya yapıştırılan URL --}}
                    <div class="form-group" id="imageUrlGroup" style="{{ $vehicle->cover_image && str_starts_with($vehicle->cover_image,'http') ? '' : 'display:none;' }}">
                        <label style="font-size:12px;" class="text-muted">Görsel URL'i (sahibinden CDN)</label>
                        <div class="input-group">
                            <input type="text" id="imageUrlInput" class="form-control form-control-sm"
                                   placeholder="https://i.sahibinden.com/..."
                                   value="{{ ($vehicle->cover_image && str_starts_with($vehicle->cover_image,'http')) ? $vehicle->cover_image : '' }}">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-sm btn-success" id="btnApplyUrl">
                                    <i class="fas fa-check"></i> Uygula
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- Dosya yükleme --}}
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="cover_image" name="cover_image" accept="image/*">
                        <label class="custom-file-label" for="cover_image">
                            {{ $vehicle->cover_image ? 'Değiştir...' : 'Görsel seçin...' }}
                        </label>
                    </div>
                    <div id="cover-preview" class="mt-2 d-none">
                        <img src="" alt="" class="img-fluid rounded" style="max-height:160px;width:100%;object-fit:cover;">
                    </div>
                    {{-- Gizli alan: URL tabanlı cover_image --}}
                    <input type="hidden" name="cover_image_url" id="cover_image_url"
                           value="{{ ($vehicle->cover_image && str_starts_with($vehicle->cover_image,'http')) ? $vehicle->cover_image : '' }}">
                </div>
            </div>

        </div>

    </div>
</form>

{{-- Sil formu --}}
<div class="row mt-2">
    <div class="col-lg-4 offset-lg-8">
        <div class="card card-danger card-outline">
            <div class="card-header"><h3 class="card-title text-danger"><i class="fas fa-trash mr-1"></i> Tehlikeli Alan</h3></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle) }}"
                      onsubmit="return confirm('Bu aracı kalıcı olarak silmek istediğinize emin misiniz?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">
                        <i class="fas fa-trash mr-1"></i> Aracı Sil
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
const CSRF = '{{ csrf_token() }}';

// Dosya önizleme
document.getElementById('cover_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = ev => {
        const p = document.getElementById('cover-preview');
        p.querySelector('img').src = ev.target.result;
        p.classList.remove('d-none');
    };
    reader.readAsDataURL(file);
    document.querySelector('label[for="cover_image"]').textContent = file.name;
    // Dosya seçilince URL alanını temizle
    document.getElementById('cover_image_url').value = '';
});

// ── Bookmarklet helper ──────────────────────────────────────────
// Bookmarklet kodu — sahibinden sayfasında tıklanınca og:image + yıl/fiyat/km gönderir
const BOOKMARKLET_CODE = `javascript:(function(){
  var m=document.querySelector('meta[property="og:image"]');
  if(!m){alert('Görsel meta etiketi bulunamadı.');return;}
  var img=m.getAttribute('content');
  // Yıl: başlık içinden (ör. "2016 Land Rover...") veya ilan başlığından
  var yearMatch=(document.title||'').match(/\b(19|20)\d{2}\b/);
  var year=yearMatch?yearMatch[0]:null;
  // Fiyat: sahibinden fiyat elementi
  var priceEl=document.querySelector('[class*="price"], .classified-price-wrapper, h3.classifiedPrice, .price-container');
  var price=priceEl?(priceEl.textContent||'').replace(/\s+/g,' ').trim().substring(0,60):null;
  // KM: özellikler tablosundan
  var kmEl=null;
  document.querySelectorAll('ul.classifiedInfoList li, .classified-properties li').forEach(function(li){
    if((li.textContent||'').includes('km')||(li.querySelector('span')||{textContent:''}).textContent.toLowerCase().includes('km')){kmEl=li;}
  });
  var km=null;
  if(kmEl){var kmMatch=(kmEl.textContent||'').replace(/\./g,'').match(/\d{3,}/);km=kmMatch?parseInt(kmMatch[0]):null;}
  fetch('http://localhost:8001/admin/vehicles/sahibinden/receive-image',{
    method:'POST',
    headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'${CSRF}'},
    body:JSON.stringify({image_url:img,listing_url:location.href,year:year,price:price,km:km})
  }).then(function(){
    var parts=['✓ Görsel gönderildi'];
    if(year)parts.push('Yıl: '+year);
    if(price)parts.push('Fiyat çekildi');
    if(km)parts.push('KM: '+km);
    var d=document.createElement('div');
    d.style='position:fixed;top:20px;right:20px;z-index:999999;background:#1B3A6B;color:#fff;padding:14px 20px;border-radius:6px;font-family:sans-serif;font-size:14px;font-weight:bold;box-shadow:0 4px 20px rgba(0,0,0,.3);line-height:1.6;';
    d.textContent=parts.join(' | ');
    document.body.appendChild(d);
    setTimeout(()=>d.remove(),4000);
  }).catch(function(){alert('Gönderilemedi — admin paneli açık mı?');});
})();`;

let pollInterval = null;

function applyImageUrl(imageUrl, meta) {
    document.getElementById('cover_image_url').value = imageUrl;
    document.getElementById('imageUrlInput').value   = imageUrl;
    document.getElementById('imageUrlGroup').style.display = '';
    const p = document.getElementById('cover-preview');
    p.querySelector('img').src = imageUrl;
    p.classList.remove('d-none');

    // Yıl, fiyat, km alanlarını doldur (yalnızca boşsa)
    if (meta) {
        const yearInput  = document.querySelector('input[name="year"]');
        const priceInput = document.querySelector('input[name="price"]');
        const kmInput    = document.querySelector('input[name="km"]');
        if (meta.year  && yearInput  && !yearInput.value)  yearInput.value  = meta.year;
        if (meta.price && priceInput && !priceInput.value) priceInput.value = meta.price;
        if (meta.km    && kmInput    && !kmInput.value)    kmInput.value    = meta.km;
    }
}

function startPolling(btn) {
    let elapsed = 0;
    pollInterval = setInterval(function() {
        elapsed += 2;
        if (elapsed > 120) { // 2 dakika timeout
            clearInterval(pollInterval);
            btn.innerHTML = '<i class="fas fa-magic mr-1"></i> Görseli Çek';
            btn.disabled = false;
            return;
        }

        fetch('{{ route("admin.vehicles.sahibinden.pending-image") }}')
            .then(r => r.json())
            .then(data => {
                if (data.success && data.data) {
                    clearInterval(pollInterval);
                    applyImageUrl(data.data.image_url, data.data);
                    const parts = ['Görsel alındı'];
                    if (data.data.year)  parts.push('Yıl: ' + data.data.year);
                    if (data.data.km)    parts.push('KM: ' + Number(data.data.km).toLocaleString());
                    btn.innerHTML = '<i class="fas fa-check text-success mr-1"></i> ' + parts.join(' · ');
                    btn.disabled = false;
                    document.getElementById('bookmarkletModal').style.display = 'none';
                }
            });
    }, 2000);
}

document.getElementById('btnFetchImage').addEventListener('click', function() {
    const url = document.getElementById('sahibinden_url').value.trim();
    if (!url) { alert('Önce Sahibinden URL\'ini girin.'); return; }

    const btn = this;

    // Bookmarklet modal'ını göster
    const modal = document.getElementById('bookmarkletModal');
    modal.style.display = 'flex';

    // Sahibinden'i yeni sekmede aç
    window.open(url, '_blank');

    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Bekleniyor...';

    // Polling başlat
    if (pollInterval) clearInterval(pollInterval);
    startPolling(btn);
});

document.getElementById('btnCloseBookmarklet').addEventListener('click', function() {
    document.getElementById('bookmarkletModal').style.display = 'none';
    if (pollInterval) clearInterval(pollInterval);
    const btn = document.getElementById('btnFetchImage');
    btn.innerHTML = '<i class="fas fa-magic mr-1"></i> Görseli Çek';
    btn.disabled = false;
});

// Bookmarklet drag/copy
document.getElementById('bookmarkletLink').setAttribute('href', BOOKMARKLET_CODE);

// URL uygula
document.getElementById('btnApplyUrl').addEventListener('click', function() {
    const url = document.getElementById('imageUrlInput').value.trim();
    if (!url) return;
    document.getElementById('cover_image_url').value = url;
    const p = document.getElementById('cover-preview');
    p.querySelector('img').src = url;
    p.classList.remove('d-none');
});

// İlan Durumu Kontrol Et
document.getElementById('btnCheckStatus').addEventListener('click', function() {
    const url = document.getElementById('sahibinden_url').value.trim();
    if (!url) { alert('Önce Sahibinden URL\'ini girin.'); return; }

    const btn   = this;
    const badge = document.getElementById('statusBadge');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Kontrol...';

    fetch('{{ route("admin.vehicles.sahibinden.check-status") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({ url })
    })
    .then(r => r.json())
    .then(data => {
        if (data.status === 'active') {
            badge.innerHTML = '<span class="badge badge-success"><i class="fas fa-check-circle mr-1"></i> İlan aktif görünüyor (HTTP ' + data.code + ')</span>';
        } else if (data.status === 'likely_sold') {
            badge.innerHTML = '<span class="badge badge-warning"><i class="fas fa-exclamation-triangle mr-1"></i> İlan kaldırılmış olabilir (HTTP ' + data.code + ')</span>';
        } else {
            badge.innerHTML = '<span class="badge badge-secondary">Belirlenemedi</span>';
        }
        btn.innerHTML = '<i class="fas fa-sync-alt mr-1"></i> Kontrol Et';
        btn.disabled = false;
    });
});
</script>
@stop
