@extends('adminlte::page')

@section('title', 'Site Ayarları')

@section('content_header')
    <h1 class="m-0">Site Ayarları</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            {{-- Genel Ayarlar --}}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title"><i class="fas fa-globe mr-1"></i> Genel Ayarlar</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Site Adı <span class="text-danger">*</span></label>
                            <input type="text" name="site_name" class="form-control"
                                   value="{{ old('site_name', $general['site_name'] ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Slogan</label>
                            <input type="text" name="site_tagline" class="form-control"
                                   value="{{ old('site_tagline', $general['site_tagline'] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            @if(!empty($general['logo']))
                                <div class="mb-2">
                                    <img src="{{ Storage::url($general['logo']) }}" alt="Logo" style="max-height:60px">
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/*">
                                <label class="custom-file-label" for="logo">Yeni Logo Seç</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Favicon</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="favicon" name="favicon" accept="image/*">
                                <label class="custom-file-label" for="favicon">Favicon Seç (ICO/PNG)</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- İletişim --}}
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h3 class="card-title"><i class="fas fa-phone mr-1"></i> İletişim Bilgileri</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>E-posta</label>
                            <input type="email" name="site_email" class="form-control"
                                   value="{{ old('site_email', $contact['site_email'] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Telefon</label>
                            <input type="text" name="site_phone" class="form-control"
                                   value="{{ old('site_phone', $contact['site_phone'] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Adres</label>
                            <textarea name="site_address" class="form-control" rows="2">{{ old('site_address', $contact['site_address'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SEO & Sosyal --}}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title"><i class="fas fa-search mr-1"></i> SEO Ayarları</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Global Meta Açıklama</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $seo['meta_description'] ?? '') }}</textarea>
                            <small class="text-muted">140-160 karakter önerilir.</small>
                        </div>
                        <div class="form-group">
                            <label>Global Anahtar Kelimeler</label>
                            <input type="text" name="meta_keywords" class="form-control"
                                   value="{{ old('meta_keywords', $seo['meta_keywords'] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Google Analytics ID</label>
                            <input type="text" name="google_analytics" class="form-control"
                                   value="{{ old('google_analytics', $seo['google_analytics'] ?? '') }}"
                                   placeholder="G-XXXXXXXXXX">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3 class="card-title"><i class="fas fa-share-alt mr-1"></i> Sosyal Medya</h3>
                    </div>
                    <div class="card-body">
                        @foreach(['facebook_url' => ['Facebook', 'fab fa-facebook'], 'instagram_url' => ['Instagram', 'fab fa-instagram'], 'twitter_url' => ['Twitter/X', 'fab fa-twitter'], 'youtube_url' => ['YouTube', 'fab fa-youtube'], 'linkedin_url' => ['LinkedIn', 'fab fa-linkedin']] as $key => [$label, $icon])
                            <div class="form-group">
                                <label><i class="{{ $icon }} mr-1"></i> {{ $label }}</label>
                                <input type="url" name="{{ $key }}" class="form-control"
                                       value="{{ old($key, $social[$key] ?? '') }}" placeholder="https://">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save mr-1"></i> Tüm Ayarları Kaydet
                </button>
            </div>
        </div>
    </form>
@stop

@section('js')
<script>
    ['logo', 'favicon'].forEach(id => {
        document.getElementById(id)?.addEventListener('change', function(e) {
            if (e.target.files[0]) {
                document.querySelector(`label[for="${id}"]`).textContent = e.target.files[0].name;
            }
        });
    });
</script>
@stop
