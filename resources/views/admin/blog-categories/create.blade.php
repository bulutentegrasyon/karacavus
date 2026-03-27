@extends('adminlte::page')

@section('title', 'Yeni Kategori')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Yeni Kategori</h1>
        <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="POST" action="{{ route('admin.blog-categories.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori Adı <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
