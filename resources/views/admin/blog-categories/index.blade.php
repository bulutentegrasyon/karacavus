@extends('adminlte::page')

@section('title', 'Blog Kategorileri')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Blog Kategorileri</h1>
        <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Yeni Kategori
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
            <table class="table table-striped mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Kategori Adı</th>
                        <th>Slug</th>
                        <th>Yazı Sayısı</th>
                        <th>Durum</th>
                        <th width="120">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                        <tr>
                            <td><strong>{{ $cat->name }}</strong></td>
                            <td><code>{{ $cat->slug }}</code></td>
                            <td>{{ $cat->posts_count }}</td>
                            <td>
                                @if($cat->is_active)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Pasif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.blog-categories.edit', $cat) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.blog-categories.destroy', $cat) }}" class="d-inline"
                                      onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-4 text-muted">Henüz kategori yok.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
