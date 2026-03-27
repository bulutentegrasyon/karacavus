@extends('adminlte::page')

@section('title', 'Referanslar')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Referanslar</h1>
        <a href="{{ route('admin.references.create') }}" class="btn btn-primary">
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

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th width="60">Sıra</th>
                        <th>Referans Adı</th>
                        <th>İş Miktarı</th>
                        <th>Şirket</th>
                        <th>Durum</th>
                        <th>Aktif</th>
                        <th width="100">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($references as $reference)
                        <tr>
                            <td>{{ $reference->order }}</td>
                            <td><strong>{{ $reference->name }}</strong></td>
                            <td>{{ $reference->quantity ?? '—' }}</td>
                            <td>{{ $reference->company ?? '—' }}</td>
                            <td>
                                @if($reference->status === 'tamamlanan')
                                    <span class="badge badge-success">Tamamlanan</span>
                                @else
                                    <span class="badge badge-warning">Devam Eden</span>
                                @endif
                            </td>
                            <td>
                                @if($reference->is_active)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Pasif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.references.edit', $reference) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.references.destroy', $reference) }}" class="d-inline"
                                      onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center py-4 text-muted">Henüz referans yok.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($references->hasPages())
            <div class="card-footer">{{ $references->links() }}</div>
        @endif
    </div>
@stop
