@extends('adminlte::page')

@section('title', 'Projeyi Düzenle')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Projeyi Düzenle</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Proje Adı <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                        </div>
                        <div class="form-group">
                            <label>Slug (URL)</label>
                            <input type="text" class="form-control" value="{{ $project->slug }}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="category" class="form-control" value="{{ old('category', $project->category) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yıl</label>
                                    <input type="text" name="year" class="form-control" value="{{ old('year', $project->year) }}" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Müşteri</label>
                                    <input type="text" name="client" class="form-control" value="{{ old('client', $project->client) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lokasyon</label>
                                    <input type="text" name="location" class="form-control" value="{{ old('location', $project->location) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Özet</label>
                            <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $project->excerpt) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Proje Açıklaması <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="12">{{ old('content', $project->content) }}</textarea>
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
                            <input type="text" name="meta_title" class="form-control"
                                   value="{{ old('meta_title', $project->getRawOriginal('meta_title')) }}">
                        </div>
                        <div class="form-group">
                            <label>Meta Açıklama</label>
                            <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $project->meta_description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Anahtar Kelimeler</label>
                            <input type="text" name="meta_keywords" class="form-control"
                                   value="{{ old('meta_keywords', $project->meta_keywords) }}">
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
                            <input type="number" name="order" class="form-control" value="{{ old('order', $project->order) }}" min="0">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="custom-control-input" id="is_active"
                                       name="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Aktif</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="is_featured" value="0">
                                <input type="checkbox" class="custom-control-input" id="is_featured"
                                       name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_featured">Öne Çıkan</label>
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
                        @if($project->cover_image)
                            <img src="{{ Storage::url($project->cover_image) }}" alt="" class="img-fluid rounded mb-2">
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="cover_image" name="cover_image" accept="image/*">
                            <label class="custom-file-label" for="cover_image">Yeni Görsel Seç</label>
                        </div>
                    </div>
                </div>

                @if($project->gallery)
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Mevcut Galeri</h3></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($project->gallery as $img)
                                <div class="col-6 mb-2">
                                    <img src="{{ Storage::url($img) }}" alt="" class="img-fluid rounded">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <div class="card">
                    <div class="card-header"><h3 class="card-title">Yeni Galeri (Değiştirir)</h3></div>
                    <div class="card-body">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gallery" name="gallery[]"
                                   accept="image/*" multiple>
                            <label class="custom-file-label" for="gallery">Görseller Seç</label>
                        </div>
                        <small class="text-muted">Seçilirse mevcut galeri silinir.</small>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('js')
<script>
    document.getElementById('gallery').addEventListener('change', function(e) {
        const count = e.target.files.length;
        document.querySelector('label[for="gallery"]').textContent = count + ' görsel seçildi';
    });
    document.getElementById('cover_image').addEventListener('change', function(e) {
        if (e.target.files[0]) {
            document.querySelector('label[for="cover_image"]').textContent = e.target.files[0].name;
        }
    });
</script>
@stop
