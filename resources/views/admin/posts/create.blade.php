@extends('adminlte::page')

@section('title', 'Yeni Blog Yazısı')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Yeni Blog Yazısı</h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            {{-- Sol Kolon: Ana İçerik --}}
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
                            <label>Özet</label>
                            <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror"
                                      rows="3" placeholder="Kısa açıklama (SEO için önemli)">{{ old('excerpt') }}</textarea>
                            @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>İçerik <span class="text-danger">*</span></label>
                            <textarea name="content" id="content-editor"
                                      class="form-control @error('content') is-invalid @enderror"
                                      rows="15">{{ old('content') }}</textarea>
                            @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                {{-- SEO Kartı --}}
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-search mr-1"></i> SEO Ayarları</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Meta Başlık</label>
                            <input type="text" name="meta_title" class="form-control"
                                   value="{{ old('meta_title') }}" placeholder="Boş bırakılırsa yazı başlığı kullanılır">
                            <small class="text-muted">Önerilen: 50-60 karakter</small>
                        </div>
                        <div class="form-group">
                            <label>Meta Açıklama</label>
                            <textarea name="meta_description" class="form-control" rows="2"
                                      placeholder="Arama sonuçlarında görünen kısa açıklama">{{ old('meta_description') }}</textarea>
                            <small class="text-muted">Önerilen: 140-160 karakter</small>
                        </div>
                        <div class="form-group">
                            <label>Anahtar Kelimeler</label>
                            <input type="text" name="meta_keywords" class="form-control"
                                   value="{{ old('meta_keywords') }}" placeholder="virgülle ayırın">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sağ Kolon: Ayarlar --}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Yayınlama</h3></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="blog_category_id" class="form-control">
                                <option value="">— Seçiniz —</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('blog_category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Yayın Tarihi</label>
                            <input type="datetime-local" name="published_at" class="form-control"
                                   value="{{ old('published_at') }}">
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="custom-control-input" id="is_active"
                                       name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Aktif</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="is_featured" value="0">
                                <input type="checkbox" class="custom-control-input" id="is_featured"
                                       name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_featured">Öne Çıkan</label>
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
                        <div class="form-group mb-0">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="cover_image"
                                       name="cover_image" accept="image/*">
                                <label class="custom-file-label" for="cover_image">Görsel Seç</label>
                            </div>
                            @error('cover_image')<small class="text-danger">{{ $message }}</small>@enderror
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
    // Kapak önizleme
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
</script>
@stop
