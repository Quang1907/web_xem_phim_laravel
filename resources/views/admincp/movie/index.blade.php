@extends('layouts.app')
@section('title', 'Movie')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <a href="{{ route('movie.create') }}" class="btn btn-success float-end m-2">Tao moi phim</a>
                <table id='tablephim'
                    class="table table-striped table-bordered table-hover table-inverse table-responsive table-info">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th style="width: 10%">Image</th>
                            <th>Slug</th>
                            <th>Danh muc</th>
                            <th>The loai</th>
                            <th>Quoc gia</th>
                            {{-- <th>Description</th> --}}
                            <th>Phim hot</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                            if (isset($_GET['page']) && $_GET['page'] != 1) {
                                $id = $_GET['page'] * 5 - 4;
                            }
                        @endphp
                        @forelse ($movies as $model)
                            <tr>
                                <td scope="row">{{ $id++ }}</td>
                                <td>{{ $model->title }}</td>
                                <td>
                                    <img src="{{ asset('uploads/movie/' . $model->image) }}" class="img-thumbnail rounded"
                                        alt="{{ $model->title }}">
                                </td>
                                <td>{{ $model->slug }}</td>
                                <td>{{ $model->category->title }}</td>
                                <td>{{ $model->genre->title }}</td>
                                <td>{{ $model->country->title }}</td>
                                {{-- <td class="description">{{ $model->description }}</td> --}}
                                <td>
                                    @if ($model->phim_hot)
                                        <span class="badge bg-success">Public</span>
                                    @else
                                        <span class="badge bg-danger">Private</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($model->status)
                                        <span class="badge bg-success">Public</span>
                                    @else
                                        <span class="badge bg-danger">Private</span>
                                    @endif
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy', $model], 'class' => 'form-horizontal', 'onsubmit' => 'return confirm("Ban co muon tiep tuc xoa phim nay khong?")']) !!}
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('movie.edit', $model) }}" class="btn btn-warning">Edit</a>
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Not found movie</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- {{ $movies->appends(request()->all())->links() }} --}}
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

{{-- @section('css')
    <style>
        .description {
            text-overflow: ellipsis;
            overflow: hidden;
            -webkit-line-clamp: 7;
            -webkit-box-orient: vertical;
            display: -webkit-box;
        }

    </style>
@endsection --}}
