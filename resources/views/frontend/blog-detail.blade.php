@extends('layouts.frontend')

@section('title', $post->meta_title . ' | Karaçavuş Şirketler Grubu')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="page-breadcrumb bg-img space__bottom--r120" data-bg="{{ asset('assets/img/backgrounds/bc-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-breadcrumb-content text-center">
                        <h1>{{ $post->title }}</h1>
                        <ul class="page-breadcrumb-links">
                            <li><a href="/">Ana Sayfa</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li>{{ Str::limit($post->title, 40) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->
    <!--====================  blog details ====================-->
    <div class="blog-section space__bottom--r120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 order-1 order-lg-2">
                    <div class="row">
                        <div class="blog-details col-12">
                            <div class="blog-inner">
                                @if($post->cover_image)
                                <div class="media">
                                    <div class="image">
                                        <img width="770" height="450"
                                             src="{{ $post->image_url }}"
                                             alt="{{ $post->title }}">
                                    </div>
                                </div>
                                @endif
                                <div class="content">
                                    <ul class="meta">
                                        <li>Yazar: <a href="#">{{ $post->author->name ?? 'Karaçavuş' }}</a></li>
                                        <li>{{ $post->published_at->locale('tr')->isoFormat('D MMMM YYYY') }}</li>
                                        @if($post->category)
                                        <li><a href="#">{{ $post->category->name }}</a></li>
                                        @endif
                                    </ul>
                                    <h2 class="title">{{ $post->title }}</h2>
                                    <div class="desc space__bottom--30">
                                        {!! $post->content !!}
                                    </div>
                                    @if($post->meta_keywords)
                                    <ul class="tags">
                                        <li><i class="fa fa-tags"></i></li>
                                        @foreach(explode(',', $post->meta_keywords) as $tag)
                                        <li><a href="#">{{ trim($tag) }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    <div class="blog-share space__top--30">
                                        <span>Paylaş:</span>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" title="Facebook'ta Paylaş"><i class="fa fa-facebook"></i></a>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" title="Twitter'da Paylaş"><i class="fa fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}" target="_blank" title="LinkedIn'de Paylaş"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 space__top--60">
                            <div class="comment-wrapper">
                                <h3>Yorum Bırakın</h3>
                                <div class="comment-form">
                                    <form action="#">
                                        <div class="row row-10">
                                            <div class="col-md-6 col-12 space__bottom--20"><input type="text" placeholder="Adınız"></div>
                                            <div class="col-md-6 col-12 space__bottom--20"><input type="email" placeholder="E-posta Adresiniz"></div>
                                            <div class="col-12"><textarea placeholder="Mesajınız"></textarea></div>
                                            <div class="col-12"><input type="submit" value="Yorum Gönder"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 space__top__md--50 space__top__lm--50 order-2 order-lg-1">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Ara</h3>
                        <div class="sidebar-search">
                            <form action="/blog" method="GET">
                                <input type="text" name="q" placeholder="Blog'da ara...">
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
    <!--====================  End of blog details  ====================-->
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
