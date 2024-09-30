@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title w-100">{{ __('Categories') }}</div>
                <div class="w-100">
                    <a href="{{ route('admin.category.create') }}"
                        class="btn btn-primary float-right">{{ __('Create Category') }}</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('S/N') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ Str::limit($category->description ?? 'N/A', 50) }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.form.template.index', $category) }}"
                                                data-toggle="tooltip" data-placement="top" title="Form Templates"
                                                class="btn btn-success">
                                                <i class="fa fa-file"></i>
                                            </a>
                                            <a href="{{ route('admin.category.edit', $category->id) }}"
                                                data-toggle="tooltip" data-placement="top" title="Category Edit"
                                                class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">{{ __('No categories found') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
@endsection
