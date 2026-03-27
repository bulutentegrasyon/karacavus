@extends('adminlte::page')

@section('title', 'Referans Düzenle')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Referans Düzenle</h1>
        <a href="{{ route('admin.references.index', ['company' => $reference->company]) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
<form method="POST" action="{{ route('admin.references.update', $reference) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    @php
        $gallery = $reference->gallery ?? [];
        $ytItems  = array_filter($gallery, fn($g) => str_contains($g, 'youtube.com'));
        $imgItems = array_filter($gallery, fn($g) => !str_contains($g, 'youtube.com'));
    @endphp

    <div class="row">

        {{-- Sol kolon --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Temel Bilgiler</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Referans / İşveren Adı <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $reference->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Uygulayan Şirket <span class="text-danger">*</span></label>
                                <select name="company" class="form-control" required>
                                    @foreach($companies as $co)
                                    <option value="{{ $co }}" {{ old('company',$reference->company)===$co?'selected':'' }}>{{ $co }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>İş Türü</label>
                                <input type="text" name="work_type" class="form-control"
                                       value="{{ old('work_type', $reference->work_type) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>İş Miktarı</label>
                                <input type="text" name="quantity" class="form-control"
                                       value="{{ old('quantity', $reference->quantity) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lokasyon</label>
                                <input type="text" name="location" class="form-control"
                                       value="{{ old('location', $reference->location) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $reference->description) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Mevcut Galeri --}}
            @if(count($gallery))
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-photo-video mr-1"></i> Mevcut Galeri</h3>
                    <div class="card-tools"><small class="text-muted">Çıkarmak istediklerinizin işaretini kaldırın</small></div>
                </div>
                <div class="card-body">

                    {{-- YouTube videoları --}}
                    @foreach($ytItems as $yt)
                    @php preg_match('/embed\/([a-zA-Z0-9_-]+)/', $yt, $m); $vid = $m[1] ?? ''; @endphp
                    <div class="d-flex align-items-center mb-2 p-2 border rounded">
                        <div class="custom-control custom-checkbox mr-3">
                            <input type="checkbox" class="custom-control-input" id="keep_{{ md5($yt) }}"
                                   name="gallery_keep[]" value="{{ $yt }}" checked>
                            <label class="custom-control-label" for="keep_{{ md5($yt) }}"></label>
                        </div>
                        <img src="https://img.youtube.com/vi/{{ $vid }}/default.jpg" style="width:80px;height:60px;object-fit:cover;border-radius:2px;" class="mr-2">
                        <div>
                            <span class="badge badge-danger mr-1"><i class="fab fa-youtube"></i> Video</span>
                            <small class="text-muted d-block" style="word-break:break-all;">{{ $yt }}</small>
                        </div>
                    </div>
                    @endforeach

                    {{-- Görseller --}}
                    <div class="row mt-2">
                    @foreach($imgItems as $img)
                    <div class="col-4 col-md-3 mb-3">
                        <div class="position-relative">
                            <img src="{{ str_starts_with($img,'assets/') ? asset($img) : asset('storage/'.$img) }}"
                                 class="img-fluid rounded" style="aspect-ratio:4/3;object-fit:cover;width:100%;">
                            <div class="position-absolute" style="top:4px;left:4px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="keep_{{ md5($img) }}"
                                           name="gallery_keep[]" value="{{ $img }}" checked>
                                    <label class="custom-control-label" for="keep_{{ md5($img) }}"
                                           style="background:rgba(0,0,0,.5);padding:2px 6px;border-radius:2px;cursor:pointer;"></label>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted" style="font-size:10px;">
                            <input type="checkbox" name="gallery_keep[]" value="{{ $img }}" checked style="display:none;" id="keep2_{{ md5($img) }}">
                            <label for="keep_{{ md5($img) }}" class="mb-0" style="cursor:pointer;">
                                <span class="badge badge-{{ '' }}">✓ Koru</span>
                            </label>
                        </small>
                    </div>
                    @endforeach
                    </div>

                </div>
            </div>
            @endif

            {{-- Yeni Medya Ekle --}}
            <div class="card">
                <div class="card-header"><h3 class="card-title"><i class="fas fa-plus mr-1"></i> Yeni Medya Ekle</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label><i class="fab fa-youtube text-danger mr-1"></i> YouTube URL'leri <small class="text-muted">(her satıra bir URL)</small></label>
                        <textarea name="youtube_urls" class="form-control" rows="2"
                            placeholder="https://www.youtube.com/watch?v=VIDEO_ID">{{ old('youtube_urls') }}</textarea>
                    </div>
                    <div class="form-group mb-0">
                        <label><i class="fas fa-images mr-1"></i> Yeni Görseller <small class="text-muted">(çoklu)</small></label>
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
                        <label>Proje Durumu</label>
                        <select name="status" class="form-control">
                            <option value="tamamlanan" {{ old('status',$reference->status)==='tamamlanan'?'selected':'' }}>Tamamlanan</option>
                            <option value="devam_eden" {{ old('status',$reference->status)==='devam_eden'?'selected':'' }}>Devam Eden</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sıralama</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order',$reference->order) }}" min="0">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="custom-control-input" id="is_active"
                                   name="is_active" value="1" {{ old('is_active',$reference->is_active) ? 'checked' : '' }}>
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
                    @if($reference->cover_image)
                    <div class="mb-2">
                        <img src="{{ $reference->cover_url }}" class="img-fluid rounded" style="max-height:140px;">
                    </div>
                    @endif
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="cover_image" name="cover_image" accept="image/*">
                        <label class="custom-file-label" for="cover_image">{{ $reference->cover_image ? 'Değiştir...' : 'Görsel seçin...' }}</label>
                    </div>
                    <div id="cover-preview" class="mt-2 d-none">
                        <img src="" alt="" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <div class="card card-danger card-outline">
                <div class="card-header"><h3 class="card-title text-danger"><i class="fas fa-trash mr-1"></i> Tehlikeli Alan</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.references.destroy', $reference) }}"
                          onsubmit="return confirm('Bu referansı kalıcı olarak silmek istediğinize emin misiniz?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-trash mr-1"></i> Referansı Sil
                        </button>
                    </form>
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
