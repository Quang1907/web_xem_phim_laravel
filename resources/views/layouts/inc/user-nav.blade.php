<div class="navbar-container">
    <div class="container">
        <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse"
                    data-target="#halim" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed pull-right expand-search-form"
                    data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                    <span class="hl-search" aria-hidden="true"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                    Bookmarks<i class="hl-bookmark" aria-hidden="true"></i>
                    <span class="count">0</span>
                </button>
                <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                    <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i
                            class="fas fa-filter"></i></a>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="halim">
                <div class="menu-menu_1-container">
                    <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active"><a title="Trang Chủ" href="{{ route('Homepage') }}">Trang
                                Chủ</a>
                        </li>
                        <li class="mega dropdown">
                            <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle"
                                aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach ($genres as $model)
                                    <li><a title="{{ $model->title }}"
                                            href="{{ route('genre', $model->slug) }}">{{ $model->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="mega dropdown">
                            <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle"
                                aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach ($countries as $model)
                                    <li><a title="{{ $model->title }}"
                                            href="{{ route('country', $model->slug) }}">{{ $model->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @foreach ($categories as $model)
                            <li class="mega">
                                <a title="{{ $model->title }}"
                                    href="{{ route('category', $model->slug) }}">{{ $model->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-left" style="background:#000;">
                    <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                </ul>
            </div>
        </nav>
        <div class="collapse navbar-collapse" id="search-form">
            <div id="mobile-search-form" class="halim-search-form"></div>
        </div>
        <div class="collapse navbar-collapse" id="user-info">
            <div id="mobile-user-login"></div>
        </div>
    </div>
</div>
