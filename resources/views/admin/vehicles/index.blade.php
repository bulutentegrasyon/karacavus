@extends('adminlte::page')

@section('title', 'Araçlar – Ömkar Otomotiv')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Araçlar <small class="text-muted" style="font-size:14px;">Ömkar Otomotiv</small></h1>
        <div class="d-flex gap-2" style="gap:8px;">
            <button type="button" class="btn btn-outline-warning" id="btnSyncAll" title="Satılmış ilanları otomatik pasife al">
                <i class="fas fa-sync-alt mr-1"></i> Sahibinden Senkronize Et
            </button>
            <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-1"></i> Yeni Araç
            </a>
        </div>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    @php
        $catLabels = [
            'arazi_suv' => 'Arazi & SUV',
            'otomobil'  => 'Otomobil',
            'minivan'   => 'Minivan & Panelvan',
            'ticari'    => 'Ticari Araçlar',
        ];
    @endphp

    {{-- Kategori Sekmeleri --}}
    <div class="card card-outline card-primary mb-3">
        <div class="card-body p-2">
            <div class="d-flex flex-wrap" style="gap:6px;">
                <a href="{{ route('admin.vehicles.index') }}"
                   class="btn btn-sm {{ !$category ? 'btn-primary' : 'btn-outline-secondary' }}">
                    Tümü <span class="badge badge-light ml-1">{{ array_sum($counts) }}</span>
                </a>
                @foreach($catLabels as $key => $label)
                <a href="{{ route('admin.vehicles.index', ['category' => $key]) }}"
                   class="btn btn-sm {{ $category === $key ? 'btn-primary' : 'btn-outline-secondary' }}">
                    {{ $label }} <span class="badge badge-light ml-1">{{ $counts[$key] ?? 0 }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Arama --}}
    <form method="GET" action="{{ route('admin.vehicles.index') }}" class="mb-3">
        @if($category)<input type="hidden" name="category" value="{{ $category }}">@endif
        <div class="input-group" style="max-width:400px;">
            <input type="text" name="search" class="form-control" placeholder="Araç adı ara..." value="{{ $search }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                @if($search)<a href="{{ route('admin.vehicles.index', $category ? ['category'=>$category] : []) }}" class="btn btn-outline-danger"><i class="fas fa-times"></i></a>@endif
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-sm table-striped table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th width="50">#</th>
                        <th width="60">Görsel</th>
                        <th>Araç Adı</th>
                        <th>Marka</th>
                        <th>Yıl</th>
                        <th>Kategori</th>
                        <th>Tip</th>
                        <th width="60">İlan</th>
                        <th width="40">Aktif</th>
                        <th width="90">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vehicles as $vehicle)
                    <tr>
                        <td class="text-muted small">{{ $vehicles->firstItem() + $loop->index }}</td>
                        <td>
                            @if($vehicle->cover_image)
                                <img src="{{ str_starts_with($vehicle->cover_image,'http') ? $vehicle->cover_image : asset('storage/'.$vehicle->cover_image) }}"
                                     style="width:50px;height:36px;object-fit:cover;border-radius:2px;">
                            @else
                                <div style="width:50px;height:36px;background:#1B3A6B;border-radius:2px;display:flex;align-items:center;justify-content:center;">
                                    <i class="fas fa-car" style="font-size:14px;color:rgba(255,255,255,.5);"></i>
                                </div>
                            @endif
                        </td>
                        <td style="max-width:320px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                            <strong>{{ $vehicle->name }}</strong>
                        </td>
                        <td class="small">{{ ucfirst($vehicle->brand ?? '—') }}</td>
                        <td class="small">{{ $vehicle->year ?? '—' }}</td>
                        <td>
                            <span class="badge badge-dark" style="font-size:10px;">{{ $catLabels[$vehicle->category] ?? $vehicle->category }}</span>
                        </td>
                        <td class="small text-muted" style="text-transform:capitalize;">{{ $vehicle->vehicle_type ?? '—' }}</td>
                        <td class="text-center">
                            @if($vehicle->sahibinden_url)
                                <a href="{{ $vehicle->sahibinden_url }}" target="_blank" class="btn btn-xs btn-outline-info" title="İlanı Aç">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($vehicle->is_active)
                                <i class="fas fa-check-circle text-success"></i>
                            @else
                                <i class="fas fa-times-circle text-secondary"></i>
                            @endif
                        </td>
                        <td style="white-space:nowrap;">
                            <a href="{{ route('admin.vehicles.edit', $vehicle) }}" class="btn btn-sm btn-info" title="Düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle) }}" class="d-inline"
                                  onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Sil"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="10" class="text-center py-4 text-muted">Bu kategoride araç bulunamadı.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($vehicles->hasPages())
            <div class="card-footer">{{ $vehicles->links('pagination::bootstrap-4') }}</div>
        @endif
    </div>
@stop

@section('js')
<script>
document.getElementById('btnSyncAll').addEventListener('click', function() {
    if (!confirm('Tüm aktif araç ilanları Sahibinden\'den kontrol edilecek.\nSatılmış / kaldırılmış ilanlar otomatik pasife alınacak.\n\nDevam?')) return;

    const btn = this;
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Kontrol ediliyor...';

    fetch('{{ route("admin.vehicles.sahibinden.sync-all") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({})
    })
    .then(r => r.json())
    .then(data => {
        let msg = `✓ ${data.checked} araç kontrol edildi.\n`;
        if (data.deactivated > 0) {
            msg += `\n✗ Pasife alınan (${data.deactivated}):\n` + data.vehicles.join('\n');
            location.reload();
        } else {
            msg += 'Pasife alınan araç yok — tüm ilanlar aktif görünüyor.';
        }
        alert(msg);
        btn.innerHTML = '<i class="fas fa-sync-alt mr-1"></i> Sahibinden Senkronize Et';
        btn.disabled = false;
    })
    .catch(() => {
        btn.innerHTML = '<i class="fas fa-sync-alt mr-1"></i> Sahibinden Senkronize Et';
        btn.disabled = false;
    });
});
</script>
@stop
