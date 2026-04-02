@extends('adminlte::page')

@section('title', 'Projeler')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Projeler</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Yeni Proje
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
                        <th>Proje Adı</th>
                        <th>Kategori</th>
                        <th>Müşteri</th>
                        <th>Yıl</th>
                        <th>Durum</th>
                        <th width="120">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->order }}</td>
                            <td>
                                <strong>{{ $project->title }}</strong>
                                @if($project->is_featured)
                                    <span class="badge badge-warning ml-1">Öne Çıkan</span>
                                @endif
                            </td>
                            <td>{{ $project->category ?? '—' }}</td>
                            <td>{{ $project->client ?? '—' }}</td>
                            <td>{{ $project->year ?? '—' }}</td>
                            <td>
                                @if($project->is_active)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Pasif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="d-inline"
                                      onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center py-4 text-muted">Henüz proje yok.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($projects->hasPages())
            <div class="card-footer">{{ $projects->links('pagination::bootstrap-4') }}</div>
        @endif
    </div>
@stop
