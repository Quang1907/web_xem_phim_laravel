@extends('layout')
@section('title', 'Chi tiet')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        {{-- @php($route = strtolower(substr(get_class($phim->category), 11))) --}}
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>
                                <span>
                                    <a
                                        href="{{ route('category', $phim->category->slug) }}">{{ $phim->category->title }}</a>
                                    »
                                    <span>
                                        <a href="{{ route('country', $phim->country->slug) }}">
                                            {{ $phim->country->title }}</a>
                                        »
                                        <span>
                                            <a href="{{ route('genre', $phim->genre->slug) }}">
                                                {{ $phim->genre->title }}</a>
                                            »
                                            <span class="breadcrumb_last" aria-current="page">{{ $phim->title }}</span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-movie-wrapper">
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                <img class="movie-thumb" src="{{ asset('uploads/movie/' . $phim->image) }}"
                                    alt="GÓA PHỤ ĐEN">
                                <div class="bwa-content">
                                    <div class="loader"></div>
                                    <a href="{{ route('watch', $phim->slug) }}" class="bwac-btn">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $phim->title }}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{ $phim->name_eng }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Trạng Thái</span> : <span
                                            class="quality">{{ $phim->resolution }}</span><span
                                            class="episode">Vietsub</span></li>
                                    <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                            class="imdb">7.2</span></li>
                                    <li class="list-info-group-item"><span>Thời lượng</span> : 133 Phút</li>
                                    <li class="list-info-group-item"><span>Thể loại</span> : <a
                                            href="{{ route('genre', $phim->genre->slug) }}"
                                            rel="category tag">{{ $phim->genre->title }}</a>
                                    </li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> : <a
                                            href="{{ route('country', $phim->country->slug) }}"
                                            rel="tag">{{ $phim->country->title }}</a>
                                    </li>
                                    <li class="list-info-group-item"><span>Đạo diễn</span> : <a class="director"
                                            rel="nofollow" href="https://phimhay.co/dao-dien/cate-shortland"
                                            title="Cate Shortland">Cate Shortland</a></li>
                                    <li class="list-info-group-item last-item"
                                        style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;">
                                        <span>Diễn viên</span> : <a href="" rel="nofollow" title="C.C. Smiff">C.C.
                                            Smiff</a>, <a href="" rel="nofollow" title="David Harbour">David Harbour</a>, <a
                                            href="" rel="nofollow" title="Erin Jameson">Erin Jameson</a>, <a href=""
                                            rel="nofollow" title="Ever Anderson">Ever Anderson</a>, <a href=""
                                            rel="nofollow" title="Florence Pugh">Florence Pugh</a>, <a href=""
                                            rel="nofollow" title="Lewis Young">Lewis Young</a>, <a href="" rel="nofollow"
                                            title="Liani Samuel">Liani Samuel</a>, <a href="" rel="nofollow"
                                            title="Michelle Lee">Michelle Lee</a>, <a href="" rel="nofollow"
                                            title="Nanna Blondell">Nanna Blondell</a>, <a href="" rel="nofollow"
                                            title="O-T Fagbenle">O-T Fagbenle</a>
                                    </li>
                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                Phim <a href="https://phimhay.co/goa-phu-den-38424/">{{ $phim->title }}</a> - 2021 -
                                {{ $phim->country->title }}:
                                <p>{{ $phim->description }}</p>
                                <h5>Từ Khoá Tìm Kiếm:</h5>
                                <ul>
                                    <li>black widow vietsub</li>
                                    <li>Black Widow 2021 Vietsub</li>
                                    <li>phim black windows 2021</li>
                                    <li>xem phim black windows</li>
                                    <li>xem phim black widow</li>
                                    <li>phim black windows</li>
                                    <li>goa phu den</li>
                                    <li>xem phim black window</li>
                                    <li>phim black widow 2021</li>
                                    <li>xem black widow</li>
                                </ul>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @forelse ($related as $rela)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $rela->slug) }}"
                                        title="{{ $rela->title }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('/uploads/movie/' . $rela->image) }}"
                                                alt="{{ $rela->title }}" title="{{ $rela->title }}"></figure>
                                        <span class="status">{{ $rela->resolution }}</span><span
                                            class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>Vietsub</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $rela->title }}</p>
                                                <p class="original_title">{{ $rela->name_eng }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @empty
                        @endforelse
                    </div>
                    <script>
                        jQuery(document).ready(function($) {
                            var owl = $('#halim_related_movies-2');
                            owl.owlCarousel({
                                loop: true,
                                margin: 4,
                                autoplay: true,
                                autoplayTimeout: 4000,
                                autoplayHoverPause: true,
                                nav: true,
                                navText: ['<i class="hl-down-open rotate-left"></i>',
                                    '<i class="hl-down-open rotate-right"></i>'
                                ],
                                responsiveClass: true,
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    480: {
                                        items: 3
                                    },
                                    600: {
                                        items: 4
                                    },
                                    1000: {
                                        items: 4
                                    }
                                }
                            })
                        });
                    </script>
                </div>
            </section>
        </main>
        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
    </div>
@endsection
