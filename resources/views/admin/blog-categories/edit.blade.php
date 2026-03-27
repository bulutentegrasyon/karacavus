@extends('adminlte::page')

@section('title', 'Kategoriyi Düzenle')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Kategoriyi Düzenle</h1>
        <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="POST" action="{{ route('admin.blog-categories.update', $blogCategory) }}">
                    @csrf @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori Adı <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $blogCategory->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" value="{{ $blogCategory->slug }}" readonly>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="custom-control-input" id="is_active"
                                       name="is_active" value="1" {{ old('is_active', $blogCategory->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Güncelle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
