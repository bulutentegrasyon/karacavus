@extends('adminlte::page')

@section('title', 'Referanslar')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Referanslar</h1>
        <a href="{{ route('admin.references.create') }}{{ $company ? '?company='.urlencode($company) : '' }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Yeni Referans
        </a>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    {{-- Şirket Sekmeleri --}}
    <div class="card card-outline card-primary mb-3">
        <div class="card-body p-2">
            <div class="d-flex flex-wrap gap-1" style="gap:6px;">
                <a href="{{ route('admin.references.index') }}"
                   class="btn btn-sm {{ !$company ? 'btn-primary' : 'btn-outline-secondary' }}">
                    Tümü <span class="badge badge-light ml-1">{{ array_sum($counts) }}</span>
                </a>
                @foreach($counts as $co => $cnt)
                <a href="{{ route('admin.references.index', ['company' => $co]) }}"
                   class="btn btn-sm {{ $company === $co ? 'btn-primary' : 'btn-outline-secondary' }}">
                    {{ $co }} <span class="badge badge-light ml-1">{{ $cnt }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Arama --}}
    <form method="GET" action="{{ route('admin.references.index') }}" class="mb-3">
        @if($company)<input type="hidden" name="company" value="{{ $company }}">@endif
        <div class="input-group" style="max-width:400px;">
            <input type="text" name="search" class="form-control" placeholder="Referans adı ara..." value="{{ $search }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                @if($search)<a href="{{ route('admin.references.index', $company ? ['company'=>$company] : []) }}" class="btn btn-outline-danger"><i class="fas fa-times"></i></a>@endif
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-sm table-striped table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th width="50">#</th>
                        <th>Referans Adı</th>
                        <th>Miktar</th>
                        <th>Uygulayan Şirket</th>
                        <th>Tür</th>
                        <th>Durum</th>
                        <th width="60">Medya</th>
                        <th width="40">Aktif</th>
                        <th width="90">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($references as $reference)
                    <tr>
                        <td class="text-muted small">{{ $reference->order }}</td>
                        <td style="max-width:420px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                            <strong>{{ $reference->name }}</strong>
                        </td>
                        <td class="small">{{ $reference->quantity ?? '—' }}</td>
                        <td>
                            <span class="badge badge-dark" style="font-size:10px;">{{ $reference->company ?? '—' }}</span>
                        </td>
                        <td class="small text-muted">{{ $reference->work_type ?? '—' }}</td>
                        <td>
                            @if($reference->status === 'tamamlanan')
                                <span class="badge badge-success">Tamamlanan</span>
                            @else
                                <span class="badge badge-warning">Devam Eden</span>
                            @endif
                        </td>
                        <td class="text-center small text-muted">
                            @php $g = $reference->gallery ?? []; @endphp
                            @if(count($g))
                                <i class="fas fa-images text-info" title="{{ count($g) }} medya"></i> {{ count($g) }}
                            @else —
                            @endif
                        </td>
                        <td class="text-center">
                            @if($reference->is_active)
                                <i class="fas fa-check-circle text-success"></i>
                            @else
                                <i class="fas fa-times-circle text-secondary"></i>
                            @endif
                        </td>
                        <td style="white-space:nowrap;">
                            <a href="{{ route('admin.references.edit', $reference) }}" class="btn btn-sm btn-info" title="Düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.references.destroy', $reference) }}" class="d-inline"
                                  onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Sil"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center py-4 text-muted">Bu şirkete ait referans bulunamadı.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($references->hasPages())
            <div class="card-footer">{{ $references->links('pagination::bootstrap-4') }}</div>
        @endif
    </div>
@stop
