@extends('adminlte::page')

@section('title', 'Yorumu Düzenle')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Yorumu Düzenle</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
<form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Yorum Bilgileri</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ad Soyad <span class="text-danger">*</span></label>
                                <input type="text" name="author_name" class="form-control @error('author_name') is-invalid @enderror"
                                       value="{{ old('author_name', $testimonial->author_name) }}" required>
                                @error('author_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Şirket / Unvan</label>
                                <input type="text" name="author_company" class="form-control"
                                       value="{{ old('author_company', $testimonial->author_company) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Yorum <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                  rows="4" required>{{ old('content', $testimonial->content) }}</textarea>
                        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Ayarlar</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Puan <span class="text-danger">*</span></label>
                        <select name="rating" class="form-control">
                            @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                {{ str_repeat('★', $i) }}{{ str_repeat('☆', 5 - $i) }} ({{ $i }})
                            </option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sıralama</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $testimonial->order) }}" min="0">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="custom-control-input" id="is_active"
                                   name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
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

            <div class="card card-danger card-outline">
                <div class="card-header"><h3 class="card-title text-danger"><i class="fas fa-trash mr-1"></i> Tehlikeli Alan</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                          onsubmit="return confirm('Bu yorumu kalıcı olarak silmek istediğinize emin misiniz?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-trash mr-1"></i> Yorumu Sil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
