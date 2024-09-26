@extends('layouts.app')

@section('title', 'Form Templates')

@section('content')
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title w-100">{{ __('Form Templates') }}</div>
                <div class="w-100">
                    <a href="{{ route('admin.form.template.create', $category) }}"
                        class="btn btn-primary float-right">{{ __('Create Form Template') }}</a>
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
                        @if ($formTemplates->isNotEmpty())
                            @foreach ($formTemplates as $template)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $template->name }}</td>
                                    <td>{{ $template->created_at }}</td>
                                    <td>{{ Str::limit($template->description ?? 'N/A', 50) }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.form.field.create', $template) }}"
                                                class="btn btn-success">
                                                <i class="fa fa-file"></i>
                                            </a>
                                            <a href="{{ route('admin.form.template.edit', $template) }}"
                                                class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger"
                                                data-action="{{ route('admin.form.template.destroy', $template) }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">{{ __('No form templates found') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $formTemplates->links('pagination::bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
@endsection
