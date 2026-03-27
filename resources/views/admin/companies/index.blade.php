@extends('adminlte::page')

@section('title', 'Şirketler')

@section('content_header')
    <h1 class="m-0">Şirketler</h1>
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
                        <th width="40">#</th>
                        <th>Şirket Adı</th>
                        <th>Kısa Ad</th>
                        <th>Sektör</th>
                        <th width="70">Kuruluş</th>
                        <th width="50">Aktif</th>
                        <th width="80">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $co)
                    <tr>
                        <td class="text-muted small">{{ $co->number }}</td>
                        <td>
                            <strong>{{ $co->name }}</strong>
                            @if($co->tagline)
                                <small class="text-muted d-block">{{ $co->tagline }}</small>
                            @endif
                        </td>
                        <td><span class="badge badge-dark">{{ $co->short }}</span></td>
                        <td class="small text-muted">{{ $co->sector ?? '—' }}</td>
                        <td class="small text-center">{{ $co->established ?? '—' }}</td>
                        <td class="text-center">
                            @if($co->is_active)
                                <i class="fas fa-check-circle text-success"></i>
                            @else
                                <i class="fas fa-times-circle text-secondary"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.companies.edit', $co) }}" class="btn btn-sm btn-info" title="Düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
