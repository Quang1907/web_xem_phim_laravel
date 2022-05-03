@extends('layouts.app')
@section('title', 'Category')
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
                    <tbody class="order_position">
                        @php($id = 1)
                        @forelse ($categories as $model)
                            <tr id="{{ $model->id }}">
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
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $model], 'class' => 'form-horizontal', 'onsubmit' => 'return confirm("Ban co muon tiep tuc xoa danh muc nay khong?")']) !!}
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('category.edit', $model) }}" class="btn btn-warning">Edit</a>
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Not found category</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- {!! $categories->appends(request()->all())->links() !!} --}}
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Them Danh Muc') }}</div>
                    <div class="card-body">
                        @if (isset($category->title))
                            {!! Form::open(['method' => 'PUT', 'route' => ['category.update', $category], 'class' => 'form-horizontal']) !!}
                            {!! Form::hidden('id', $category->id) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'route' => 'category.store', 'class' => 'form-horizontal']) !!}
                        @endif
                        <div class="form-group mb-3{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Ten danh muc') !!}
                            {!! Form::text('title', isset($category->title) ? $category->title : '', ['class' => 'form-control', 'placeholder' => 'Nhap ten danh muc', 'required' => 'required', 'onkeyup' => 'ChangeToSlug()']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('slug') ? ' has-error' : '' }}">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control', 'readonly']) !!}
                            <small class="text-danger">{{ $errors->first('slug') }}</small>
                        </div>

                        <div class="form-group mb-3{{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($category->description) ? $category->description : '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Input description', 'style' => 'resize:none']) !!}
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>

                        <div class="radio mb-3{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="" class="form-group me-3">Status</label>
                            <label for="public" class="px-3">
                                {!! Form::radio('status', '1', ((isset($category->status) && $category->status) == true ? 'checked' : '' || empty($category)) ? 'checked' : '', ['id' => 'public']) !!} Public
                            </label>
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                            <label for="private">
                                {!! Form::radio('status', '0', isset($category->status) && $category->status == false ? 'checked' : '', ['id' => 'private']) !!} Private
                            </label>
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                        </div>

                        <div class="btn-group float-end mt-3">
                            {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                            @if (isset($category))
                                {!! Form::submit('Cap nhat', ['class' => 'btn btn-success']) !!}
                            @else
                                {!! Form::submit('Them danh muc', ['class' => 'btn btn-success']) !!}
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.order_position').sortable({
            placeholder: "ui-state-highlight",
            update: function(event, ui) {
                var array_id = [];
                $('.order_position tr').each(function() {
                    array_id.push($(this).attr('id'));
                })
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('resorting') }}",
                    method: 'PUT',
                    data: {
                        array_id: array_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        toast('success', 'Sap xep danh muc thanh cong')
                    }
                });
            }
        })

        function toast(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: icon,
                title: title
            })
        }
    </script>
@endsection
