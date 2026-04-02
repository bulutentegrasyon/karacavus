@extends('adminlte::page')

@section('title', 'Hizmetler')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Hizmetler</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Yeni Hizmet
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

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th width="60">Sıra</th>
                        <th>Başlık</th>
                        <th>İkon</th>
                        <th>Durum</th>
                        <th width="120">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $service->order }}</td>
                            <td><strong>{{ $service->title }}</strong></td>
                            <td><i class="{{ $service->icon ?? 'fas fa-tools' }}"></i> {{ $service->icon }}</td>
                            <td>
                                @if($service->is_active)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Pasif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="d-inline"
                                      onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-4 text-muted">Henüz hizmet yok.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($services->hasPages())
            <div class="card-footer">{{ $services->links('pagination::bootstrap-4') }}</div>
        @endif
    </div>
@stop
