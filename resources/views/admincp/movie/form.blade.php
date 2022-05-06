@extends('layouts.app')
@section('title', 'Movie')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="{{ route('movie.index') }}" class="btn btn-success m-2">Danh sach phim</a>
                <div class="card">
                    <div class="card-header">
                        {{ isset($movie) ? 'Sua phim: ' . $movie->title : 'Them phim moi' }}
                    </div>
                    <div class="card-body">
                        @if (isset($movie))
                            {!! Form::open(['method' => 'PUT', 'route' => ['movie.update', $movie], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                            {!! Form::hidden('id', $movie->id) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'route' => 'movie.store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                        @endif

                        <div class="form-group mb-3{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Ten phim') !!}
                            {!! Form::text('title', isset($movie->title) ? $movie->title : '', ['class' => 'form-control', 'placeholder' => 'Nhap ten phim', 'onkeyup' => 'ChangeToSlug()']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('name_eng') ? ' has-error' : '' }}">
                            {!! Form::label('name_eng', 'Ten phim') !!}
                            {!! Form::text('name_eng', isset($movie->name_eng) ? $movie->name_eng : '', ['class' => 'form-control', 'placeholder' => 'Nhap ten phim', 'onkeyup' => 'ChangeToSlug()']) !!}
                            <small class="text-danger">{{ $errors->first('name_eng') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('slug') ? ' has-error' : '' }}">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control', 'readonly']) !!}
                            <small class="text-danger">{{ $errors->first('slug') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($movie->description) ? $movie->description : '', ['class' => 'form-control', 'placeholder' => 'Input description', 'style' => 'resize:none']) !!}
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('image') ? ' has-error' : '' }}">
                            {!! Form::label('image', 'Tai len hinh anh dai dien') !!}
                            {!! Form::file('image', ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('image') }}</small>
                            @if (isset($movie->image))
                                <img src="{{ asset('uploads/movie/' . $movie->image) }}" class="img-thumbnail rounded"
                                    alt="{{ $movie->title }}">
                            @endif
                        </div>

                        <div class="form-group mb-3{{ $errors->has('resolution') ? ' has-error' : '' }}">
                            {!! Form::label('resolution', 'Dinh dang') !!}
                            {!! Form::select('resolution', ['Full HD' => 'Full HD', 'HD' => 'HD', 'SD' => 'SD', 'HDCam' => 'HDCam', 'Cam' => 'Cam'], isset($movie->resolution) ? $movie->resolution : '', ['id' => 'resolution', 'class' => 'form-select']) !!}
                            <small class="text-danger">{{ $errors->first('resolution') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            {!! Form::label('category_id', 'Danh muc') !!}
                            {!! Form::select('category_id', $categories, isset($movie->category_id) ? $movie->category_id : '', ['id' => 'category_id', 'class' => 'form-select']) !!}
                            <small class="text-danger">{{ $errors->first('category_id') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('genre_id') ? ' has-error' : '' }}">
                            {!! Form::label('genre_id', 'The loai') !!}
                            {!! Form::select('genre_id', $genres, isset($movie->genre_id) ? $movie->genre_id : '', ['id' => 'genre_id', 'class' => 'form-select']) !!}
                            <small class="text-danger">{{ $errors->first('genre_id') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('country_id') ? ' has-error' : '' }}">
                            {!! Form::label('country_id', 'Quoc gia') !!}
                            {!! Form::select('country_id', $countries, isset($movie->country_id) ? $movie->country_id : '', ['id' => 'country_id', 'class' => 'form-select']) !!}
                            <small class="text-danger">{{ $errors->first('country_id') }}</small>
                        </div>

                        <div class="radio mb-3{{ $errors->has('phim_hot') ? ' has-error' : '' }}">
                            <label for="" class="form-group me-3">Phim hot</label>
                            <label for="public_phimhot" class="px-3">
                                {!! Form::radio('phim_hot', '1', ((isset($movie->phim_hot) && $movie->phim_hot) == true ? 'checked' : '' || empty($movie)) ? 'checked' : '', ['id' => 'public_phimhot']) !!} Public
                            </label>
                            <small class="text-danger">{{ $errors->first('phim_hot') }}</small>
                            <label for="private_phimhot">
                                {!! Form::radio('phim_hot', '0', isset($movie->phim_hot) && $movie->phim_hot == false ? 'checked' : '', ['id' => 'private_phimhot']) !!} Private
                            </label>
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                        </div>

                        <div class="radio mb-3{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="" class="form-group me-3">Status</label>
                            <label for="public_status" class="px-3">
                                {!! Form::radio('status', '1', ((isset($movie->status) && $movie->status) == true ? 'checked' : '' || empty($movie)) ? 'checked' : '', ['id' => 'public_status']) !!} Public
                            </label>
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                            <label for="private_status">
                                {!! Form::radio('status', '0', isset($movie->status) && $movie->status == false ? 'checked' : '', ['id' => 'private_status']) !!} Private
                            </label>
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                        </div>

                        <div class="radio mb-3{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                            <label for="" class="form-group me-3">Subtitle</label>
                            <label for="public_subtitle" class="px-3">
                                {!! Form::radio('subtitle', '1', ((isset($movie->subtitle) && $movie->subtitle) == true ? 'checked' : '' || empty($movie)) ? 'checked' : '', ['id' => 'public_subtitle']) !!} Phụ đề
                            </label>
                            <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                            <label for="private_subtitle">
                                {!! Form::radio('subtitle', '0', isset($movie->subtitle) && $movie->subtitle == false ? 'checked' : '', ['id' => 'private_subtitle']) !!} Thuyết minh
                            </label>
                            <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                        </div>

                        <div class="btn-group float-end mt-3">
                            @if (isset($movie))
                                {!! Form::submit('Cap nhat', ['class' => 'btn btn-success']) !!}
                            @else
                                {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                                {!! Form::submit('Them phim', ['class' => 'btn btn-success']) !!}
                            @endif
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/slug.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tablephim').DataTable();
        });
    </script>
@endsection
