<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.create') }}">Danh muc phim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('genre.create') }} ">The loai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('country.create') }}">Quoc gia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movie.index') }}">Phim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('episode.create') }}">Tap Phim</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success w-100" type="submit">Tim kiem phim</button>
            </form>
        </div>
    </div>
</nav>
