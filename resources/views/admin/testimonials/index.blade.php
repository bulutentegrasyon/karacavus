@extends('adminlte::page')

@section('title', 'Müşteri Yorumları')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Müşteri Yorumları</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Yeni Yorum
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
            <table class="table table-sm table-striped table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th width="50">Sıra</th>
                        <th>Ad</th>
                        <th>Şirket</th>
                        <th>Yorum</th>
                        <th width="80">Puan</th>
                        <th width="50">Aktif</th>
                        <th width="90">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $t)
                    <tr>
                        <td class="text-muted small">{{ $t->order }}</td>
                        <td><strong>{{ $t->author_name }}</strong></td>
                        <td class="small text-muted">{{ $t->author_company ?? '—' }}</td>
                        <td style="max-width:380px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" class="small">
                            {{ $t->content }}
                        </td>
                        <td>
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star {{ $i <= $t->rating ? 'text-warning' : 'text-muted' }}" style="font-size:11px;"></i>
                            @endfor
                        </td>
                        <td class="text-center">
                            @if($t->is_active)
                                <i class="fas fa-check-circle text-success"></i>
                            @else
                                <i class="fas fa-times-circle text-secondary"></i>
                            @endif
                        </td>
                        <td style="white-space:nowrap;">
                            <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm btn-info" title="Düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" class="d-inline"
                                  onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Sil"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center py-4 text-muted">Henüz yorum eklenmedi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($testimonials->hasPages())
            <div class="card-footer">{{ $testimonials->links('pagination::bootstrap-4') }}</div>
        @endif
    </div>
@stop
