@extends('adminlte::page')

@section('title', 'Yeni Referans')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Yeni Referans</h1>
        <a href="{{ route('admin.references.index', request('company') ? ['company'=>request('company')] : []) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
<form method="POST" action="{{ route('admin.references.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">

        {{-- Sol kolon --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Temel Bilgiler</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Referans / İşveren Adı <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required placeholder="Firma veya proje adı">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Uygulayan Şirket <span class="text-danger">*</span></label>
                                <select name="company" class="form-control @error('company') is-invalid @enderror" required>
                                    <option value="">— Şirket Seç —</option>
                                    @foreach($companies as $co)
                                    <option value="{{ $co }}" {{ old('company', request('company')) === $co ? 'selected' : '' }}>{{ $co }}</option>
                                    @endforeach
                                </select>
                                @error('company')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>İş Türü</label>
                                <input type="text" name="work_type" class="form-control"
                                       value="{{ old('work_type', 'Hafriyat') }}" placeholder="Hafriyat, İnşaat, Yıkım...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>İş Miktarı</label>
                                <input type="text" name="quantity" class="form-control"
                                       value="{{ old('quantity') }}" placeholder="örn: 150.000 m³ veya 22 Araç">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lokasyon</label>
                                <input type="text" name="location" class="form-control"
                                       value="{{ old('location') }}" placeholder="İstanbul, Kartal">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Proje hakkında kısa bilgi...">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Galeri --}}
            <div class="card">
                <div class="card-header"><h3 class="card-title"><i class="fas fa-images mr-1"></i> Medya Galerisi</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label><i class="fab fa-youtube text-danger mr-1"></i> YouTube URL'leri <small class="text-muted">(her satıra bir URL)</small></label>
                        <textarea name="youtube_urls" class="form-control" rows="3"
                            placeholder="https://www.youtube.com/watch?v=VIDEO_ID&#10;https://youtu.be/VIDEO_ID&#10;https://www.youtube.com/embed/VIDEO_ID">{{ old('youtube_urls') }}</textarea>
                        <small class="text-muted">youtube.com, youtu.be veya embed URL formatları desteklenir.</small>
                    </div>
                    <div class="form-group mb-0">
                        <label><i class="fas fa-images mr-1"></i> Görsel Yükle <small class="text-muted">(çoklu seçim)</small></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gallery" name="gallery[]" accept="image/*" multiple>
                            <label class="custom-file-label" for="gallery">Görsel seçin...</label>
                        </div>
                        <div id="gallery-preview" class="row mt-2"></div>
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
                        <label>Proje Durumu <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="tamamlanan" {{ old('status','tamamlanan')==='tamamlanan'?'selected':'' }}>Tamamlanan</option>
                            <option value="devam_eden" {{ old('status')==='devam_eden'?'selected':'' }}>Devam Eden</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sıralama</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" min="0">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="custom-control-input" id="is_active"
                                   name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Aktif (Sitede göster)</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-save mr-1"></i> Kaydet
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3 class="card-title">Kapak Görseli</h3></div>
                <div class="card-body">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="cover_image" name="cover_image" accept="image/*">
                        <label class="custom-file-label" for="cover_image">Görsel seçin...</label>
                    </div>
                    <div id="cover-preview" class="mt-2 d-none">
                        <img src="" alt="" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@stop

@section('js')
<script>
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
});

document.getElementById('gallery').addEventListener('change', function(e) {
    const preview = document.getElementById('gallery-preview');
    preview.innerHTML = '';
    Array.from(e.target.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = ev => {
            preview.innerHTML += `<div class="col-4 mb-2"><img src="${ev.target.result}" class="img-fluid rounded" style="aspect-ratio:4/3;object-fit:cover;"></div>`;
        };
        reader.readAsDataURL(file);
    });
    document.querySelector('label[for="gallery"]').textContent = e.target.files.length + ' görsel seçildi';
});
</script>
@stop
