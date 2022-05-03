@extends('layouts.app')
@section('title', 'Country')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center d-flex">
            <div class="col-sm-8">
                <table class="table table-striped table-bordered table-hover table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Active/Inactive</th>
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
                        @forelse ($countries as $model)
                            <tr>
                                <td scope="row">{{ $id++ }}</td>
                                <td>{{ $model->title }}</td>
                                <td>{{ $model->slug }}</td>
                                <td>{{ $model->description }}</td>
                                <td>
                                    @if ($model->status)
                                        <span class="badge bg-success">Public</span>
                                    @else
                                        <span class="badge bg-danger">Private</span>
                                    @endif
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['country.destroy', $model], 'class' => 'form-horizontal', 'onsubmit' => 'return confirm("Ban co muon tiep tuc xoa quoc gia nay khong?")']) !!}
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('country.edit', $model) }}" class="btn btn-warning">Edit</a>
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Not found country</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $countries->appends(request()->all())->links() }}
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Them quoc gia') }}</div>
                    <div class="card-body">
                        @if (isset($country->title))
                            {!! Form::open(['method' => 'PUT', 'route' => ['country.update', $country], 'class' => 'form-horizontal']) !!}
                            {!! Form::hidden('id', $country->id) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'route' => 'country.store', 'class' => 'form-horizontal']) !!}
                        @endif

                        <div class="form-group mb-3{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Ten quoc gia') !!}
                            {!! Form::text('title', isset($country->title) ? $country->title : '', ['class' => 'form-control', 'placeholder' => 'Nhap ten quoc gia', 'required' => 'required', 'onkeyup' => 'ChangeToSlug()']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('slug') ? ' has-error' : '' }}">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control', 'readonly']) !!}
                            <small class="text-danger">{{ $errors->first('slug') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($country->description) ? $country->description : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Input description', 'style' => 'resize:none']) !!}
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>

                        <div class="radio mb-3{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="" class="form-group me-3">Status</label>
                            <label for="public" class="px-3">
                                {!! Form::radio('status', '1', ((isset($country->status) && $country->status) == true ? 'checked' : '' || empty($country)) ? 'checked' : '', ['id' => 'public']) !!} Public
                            </label>
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                            <label for="private">
                                {!! Form::radio('status', '0', isset($country->status) && $country->status == false ? 'checked' : '', ['id' => 'private']) !!} Private
                            </label>
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                        </div>

                        <div class="btn-group float-end mt-3">
                            {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                            @if (isset($country))
                                {!! Form::submit('Cap nhat', ['class' => 'btn btn-success']) !!}
                            @else
                                {!! Form::submit('Them quoc gia', ['class' => 'btn btn-success']) !!}
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
@endsection
