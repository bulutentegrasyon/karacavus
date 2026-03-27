@extends('adminlte::page')

@section('title', 'Referans Düzenle')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Referans Düzenle</h1>
        <a href="{{ route('admin.references.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.references.update', $reference) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Referans Adı <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $reference->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>İş Türü</label>
                                    <input type="text" name="work_type" class="form-control"
                                           value="{{ old('work_type', $reference->work_type) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>İş Miktarı</label>
                                    <input type="text" name="quantity" class="form-control"
                                           value="{{ old('quantity', $reference->quantity) }}" placeholder="örn: 150.000 m³">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Uygulayan Şirket</label>
                                    <input type="text" name="company" class="form-control"
                                           value="{{ old('company', $reference->company) }}">
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
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $reference->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Ayarlar</h3></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Durum <span class="text-danger">*</span></label>
                            <select name="status" class="form-control">
                                <option value="tamamlanan" {{ old('status', $reference->status)==='tamamlanan' ? 'selected' : '' }}>Tamamlanan</option>
                                <option value="devam_eden" {{ old('status', $reference->status)==='devam_eden' ? 'selected' : '' }}>Devam Eden</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sıralama</label>
                            <input type="number" name="order" class="form-control"
                                   value="{{ old('order', $reference->order) }}" min="0">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="custom-control-input" id="is_active"
                                       name="is_active" value="1" {{ old('is_active', $reference->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Aktif</label>
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
                                <img src="{{ $reference->cover_url }}" alt="" class="img-fluid rounded" style="max-height:120px;">
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="cover_image" name="cover_image" accept="image/*">
                            <label class="custom-file-label" for="cover_image">Yeni Görsel Seç</label>
                        </div>
                        <div id="cover-preview" class="mt-2 d-none">
                            <img src="" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h3 class="card-title">Galeri (Çoklu)</h3></div>
                    <div class="card-body">
                        @if($reference->gallery && count($reference->gallery))
                            <div class="row mb-2">
                                @foreach($reference->gallery as $img)
                                    <div class="col-4 mb-1">
                                        <img src="{{ str_starts_with($img,'assets/') ? asset($img) : asset('storage/'.$img) }}"
                                             alt="" class="img-fluid rounded" style="aspect-ratio:1;object-fit:cover;">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gallery" name="gallery[]"
                                   accept="image/*" multiple>
                            <label class="custom-file-label" for="gallery">Yeni Görseller Seç</label>
                        </div>
                        <small class="text-muted">Seçerseniz mevcut galeri değiştirilir.</small>
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
        reader.onload = (ev) => {
            const preview = document.getElementById('cover-preview');
            preview.querySelector('img').src = ev.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
        document.querySelector('label[for="cover_image"]').textContent = file.name;
    });

    document.getElementById('gallery').addEventListener('change', function(e) {
        const count = e.target.files.length;
        document.querySelector('label[for="gallery"]').textContent = count + ' görsel seçildi';
    });
</script>
@stop
