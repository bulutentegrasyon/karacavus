@extends('adminlte::page')

@section('title', 'Hizmeti Düzenle')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Hizmeti Düzenle</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Başlık <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
                        </div>
                        <div class="form-group">
                            <label>Slug (URL)</label>
                            <input type="text" class="form-control" value="{{ $service->slug }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>İkon Sınıfı</label>
                            <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}">
                        </div>
                        <div class="form-group">
                            <label>Özet</label>
                            <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $service->excerpt) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>İçerik <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="12">{{ old('content', $service->content) }}</textarea>
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
                                   value="{{ old('meta_title', $service->getRawOriginal('meta_title')) }}">
                        </div>
                        <div class="form-group">
                            <label>Meta Açıklama</label>
                            <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $service->meta_description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Anahtar Kelimeler</label>
                            <input type="text" name="meta_keywords" class="form-control"
                                   value="{{ old('meta_keywords', $service->meta_keywords) }}">
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
                            <input type="number" name="order" class="form-control" value="{{ old('order', $service->order) }}" min="0">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="custom-control-input" id="is_active"
                                       name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
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
                        @if($service->cover_image)
                            <img src="{{ Storage::url($service->cover_image) }}" alt="" class="img-fluid rounded mb-2">
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="cover_image" name="cover_image" accept="image/*">
                            <label class="custom-file-label" for="cover_image">Yeni Görsel Seç</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
