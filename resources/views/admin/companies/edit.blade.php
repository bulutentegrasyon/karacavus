@extends('adminlte::page')

@section('title', 'Şirket Düzenle')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">{{ $company->short }} — Düzenle</h1>
        <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Geri
        </a>
    </div>
@stop

@section('content')
<form method="POST" action="{{ route('admin.companies.update', $company) }}">
    @csrf @method('PUT')

    <div class="row">

        {{-- Sol kolon --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Temel Bilgiler</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tam Unvan <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $company->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kısa Ad <span class="text-danger">*</span></label>
                                <input type="text" name="short" class="form-control"
                                       value="{{ old('short', $company->short) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sektör</label>
                                <input type="text" name="sector" class="form-control"
                                       value="{{ old('sector', $company->sector) }}" placeholder="Hafriyat · İnşaat">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slogan / Tagline</label>
                        <input type="text" name="tagline" class="form-control"
                               value="{{ old('tagline', $company->tagline) }}" placeholder="Grubun kurucu ve ana şirketi">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3 class="card-title">Hakkında</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Şirket Açıklaması</label>
                        <textarea name="about" class="form-control" rows="5"
                                  placeholder="Şirket hakkında detaylı açıklama...">{{ old('about', $company->about) }}</textarea>
                    </div>
                    <div class="form-group mb-0">
                        <label>Faaliyet Alanları <small class="text-muted">(her satıra bir madde)</small></label>
                        <textarea name="activities" class="form-control" rows="6"
                                  placeholder="Büyük ölçekli hafriyat&#10;Proje geliştirme&#10;...">{{ old('activities', implode("\n", $company->activities ?? [])) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3 class="card-title">Vizyon / Alıntı</h3></div>
                <div class="card-body">
                    <div class="form-group mb-0">
                        <textarea name="vision" class="form-control" rows="3"
                                  placeholder="Sitede büyük alıntı olarak görünecek vizyon cümlesi...">{{ old('vision', $company->vision) }}</textarea>
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
                        <label>Kuruluş Yılı</label>
                        <input type="text" name="established" class="form-control"
                               value="{{ old('established', $company->established) }}" placeholder="2001" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label>Sıralama</label>
                        <input type="number" name="order" class="form-control"
                               value="{{ old('order', $company->order) }}" min="0">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="custom-control-input" id="is_active"
                                   name="is_active" value="1" {{ old('is_active', $company->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Aktif (Sitede göster)</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3 class="card-title">İletişim & Konum</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Adres</label>
                        <textarea name="address" class="form-control" rows="3">{{ old('address', $company->address) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input type="text" name="phone" class="form-control"
                               value="{{ old('phone', $company->phone) }}" placeholder="0530 000 00 00">
                    </div>
                    <div class="form-group mb-0">
                        <label>Harita Sorgusu <small class="text-muted">(Google Maps URL parametresi)</small></label>
                        <input type="text" name="map_query" class="form-control"
                               value="{{ old('map_query', $company->map_query) }}"
                               placeholder="Adres+Mahalle+Sokak+Sehir">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-save mr-1"></i> Güncelle
                    </button>
                </div>
            </div>
        </div>

    </div>
</form>
@stop
