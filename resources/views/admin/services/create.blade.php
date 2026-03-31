@extends('adminlte::page')

@section('title', 'Yeni Hizmet')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Yeni Hizmet</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Başlık <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>İkon Sınıfı <small class="text-muted">(örn: flaticon-002-welding)</small></label>
                            <input type="text" name="icon" class="form-control" value="{{ old('icon') }}"
                                   placeholder="flaticon-002-welding">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sektör <small class="text-muted">(örn: Hafriyat · Kazı · Zemin)</small></label>
                                    <input type="text" name="sector" class="form-control" value="{{ old('sector') }}"
                                           placeholder="Hafriyat · Kazı · Zemin">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>İlgili Şirket</label>
                                    <input type="text" name="company" class="form-control" value="{{ old('company') }}"
                                           placeholder="Karaçavuş Proje Geliştirme">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Özet / Giriş Metni</label>
                            <textarea name="excerpt" class="form-control" rows="2"
                                      placeholder="Kart ve detay sayfasında giriş olarak gösterilir.">{{ old('excerpt') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>İçerik / Açıklama <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="10"
                                      placeholder="Hizmet detay sayfasında gösterilecek uzun açıklama.">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Kapsam / Özellikler</label>
                            <div id="features-list">
                                @if(old('features'))
                                    @foreach(old('features') as $feat)
                                        <div class="input-group mb-1 feature-row">
                                            <input type="text" name="features[]" class="form-control" value="{{ $feat }}">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-danger btn-remove-feature"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-1 feature-row">
                                        <input type="text" name="features[]" class="form-control" placeholder="Özellik ekle...">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-danger btn-remove-feature"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" id="btn-add-feature" class="btn btn-sm btn-outline-secondary mt-1">
                                <i class="fas fa-plus mr-1"></i> Özellik Ekle
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-search mr-1"></i> SEO Ayarları</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Meta Başlık</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                        </div>
                        <div class="form-group">
                            <label>Meta Açıklama</label>
                            <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Anahtar Kelimeler</label>
                            <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Ayarlar</h3></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Sıralama</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" min="0">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="custom-control-input" id="is_active"
                                       name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Aktif</label>
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
                            <label class="custom-file-label" for="cover_image">Görsel Seç</label>
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
        reader.onload = (ev) => {
            const preview = document.getElementById('cover-preview');
            preview.querySelector('img').src = ev.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
        document.querySelector('.custom-file-label').textContent = file.name;
    });

    document.getElementById('btn-add-feature').addEventListener('click', function() {
        const row = document.createElement('div');
        row.className = 'input-group mb-1 feature-row';
        row.innerHTML = '<input type="text" name="features[]" class="form-control" placeholder="Özellik ekle...">'
            + '<div class="input-group-append"><button type="button" class="btn btn-outline-danger btn-remove-feature"><i class="fas fa-times"></i></button></div>';
        document.getElementById('features-list').appendChild(row);
        row.querySelector('input').focus();
    });

    document.getElementById('features-list').addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-remove-feature');
        if (!btn) return;
        const rows = document.querySelectorAll('.feature-row');
        if (rows.length > 1) btn.closest('.feature-row').remove();
        else btn.closest('.feature-row').querySelector('input').value = '';
    });
</script>
@stop
