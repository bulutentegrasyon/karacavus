@extends('layouts.frontend')

@section('title', 'Blog & Haberler | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>Blog & Haberler</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->
    <!--====================  blog area ====================-->
    <div class="blog-section space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 order-1 order-lg-2">
                    <div class="row">
                        @forelse($posts as $post)
                        <div class="col-sm-6 col-12">
                            <div class="blog-post-slider__single-slide blog-post-slider__single-slide--grid-view">
                                <div class="blog-post-slider__image space__bottom--30">
                                    <a href="/blog/{{ $post->slug }}">
                                        <img width="370" height="240"
                                             src="{{ $post->image_url }}"
                                             class="img-fluid" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="blog-post-slider__content">
                                    <p class="post-date">{{ $post->category->name ?? 'Genel' }} &mdash; {{ $post->published_at->locale('tr')->isoFormat('MMMM YYYY') }}</p>
                                    <h3 class="post-title">
                                        <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="post-excerpt">{{ $post->excerpt }}</p>
                                    <a href="/blog/{{ $post->slug }}" class="see-more-link">DEVAMINI OKU</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p style="color:#999; padding:40px 0;">Henüz blog yazısı yayınlanmamış.</p>
                        </div>
                        @endforelse
                    </div>
                    @if($posts->hasPages())
                    <div class="row">
                        <div class="col">
                            <ul class="page-pagination space__top--30">
                                @if($posts->onFirstPage())
                                    <li class="disabled"><span><i class="fa fa-angle-left"></i> Önceki</span></li>
                                @else
                                    <li><a href="{{ $posts->previousPageUrl() }}"><i class="fa fa-angle-left"></i> Önceki</a></li>
                                @endif
                                @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                    <li class="{{ $page == $posts->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                                    </li>
                                @endforeach
                                @if($posts->hasMorePages())
                                    <li><a href="{{ $posts->nextPageUrl() }}">Sonraki <i class="fa fa-angle-right"></i></a></li>
                                @else
                                    <li class="disabled"><span>Sonraki <i class="fa fa-angle-right"></i></span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-4 col-12 order-2 order-lg-1 space__top__md--50 space__top__lm--50">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Ara</h3>
                        <div class="sidebar-search">
                            <form action="/blog" method="GET">
                                <input type="text" name="q" placeholder="Blog'da ara..." value="{{ request('q') }}">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    @if($categories->count())
                    <div class="sidebar">
                        <h3 class="sidebar-title">Kategoriler</h3>
                        <ul class="sidebar-list">
                            @foreach($categories as $cat)
                            <li><a href="#">{{ $cat->name }} <span>({{ $cat->posts_count }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if($recentPosts->count())
                    <div class="sidebar">
                        <h3 class="sidebar-title">Son Yazılar</h3>
                        @foreach($recentPosts as $recent)
                        <div class="sidebar-blog">
                            <a href="/blog/{{ $recent->slug }}" class="image">
                                <img width="90" height="90"
                                     src="{{ $recent->image_url }}"
                                     alt="{{ $recent->title }}">
                            </a>
                            <div class="content">
                                <h5><a href="/blog/{{ $recent->slug }}">{{ $recent->title }}</a></h5>
                                <span>{{ $recent->published_at->locale('tr')->isoFormat('D MMMM YYYY') }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of blog area  ====================-->
    <!--====================  brand logo area ====================-->
    <div class="brand-logo-area space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-logo-wrapper">
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-020-planning"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Karaçavuş<br>Proje Geliştirme</span></a></div>
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-008-machine-1"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Asel<br>İnşaat Hafriyat</span></a></div>
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-006-truck"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Ömkar<br>Otomotiv</span></a></div>
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-037-forklift"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Nayifoğulları<br>İnşaat</span></a></div>
                        <div class="single-brand-logo"><a href="/sirketlerimiz" class="brand-item"><i class="flaticon-016-gear"></i><span style="font-family:'Rajdhani',sans-serif;font-weight:600;font-size:13px;line-height:1.2;text-transform:uppercase;">Nayifoğulları<br>YMK Yıkım</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of brand logo area  ====================-->
@endsection
