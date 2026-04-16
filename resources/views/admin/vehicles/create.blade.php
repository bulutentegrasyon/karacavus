@extends('adminlte::page')

@section('title', 'Yeni Araç')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Yeni Araç</h1>
        <a href="{{ route('admin.vehicles.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
<form method="POST" action="{{ route('admin.vehicles.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row">

        {{-- Sol kolon --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Araç Bilgileri</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Araç Adı <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Marka</label>
                                <input type="text" name="brand" class="form-control"
                                       value="{{ old('brand') }}" placeholder="mercedes, ford...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Model Yılı</label>
                                <input type="text" name="year" class="form-control"
                                       value="{{ old('year') }}" placeholder="2023">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Araç Tipi</label>
                                <input type="text" name="vehicle_type" class="form-control"
                                       value="{{ old('vehicle_type') }}" placeholder="kamyon, çekici...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sahibinden.com İlan URL'i</label>
                        <input type="url" name="sahibinden_url" class="form-control @error('sahibinden_url') is-invalid @enderror"
                               value="{{ old('sahibinden_url') }}"
                               placeholder="https://www.sahibinden.com/ilan/...">
                        @error('sahibinden_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select name="category" class="form-control" required>
                            @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ old('category') === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
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
                                   name="is_active" value="1" checked>
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
                        <img src="" alt="" class="img-fluid rounded" style="max-height:160px;width:100%;object-fit:cover;">
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
</script>
@stop
