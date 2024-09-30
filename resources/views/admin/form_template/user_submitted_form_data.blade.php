@extends('layouts.app')

@section('title', 'Submitted Form Data')

@section('content')
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title w-100">{{ __('Submitted Form Data') }}</div>
                <div class="w-100">
                    <a href="{{ route('admin.form.template.index', $category) }}" class="btn btn-primary float-right"><i class="fas fa-arrow-left mr-2"></i>{{ __('Back') }}</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('S/N') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Submitted By') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($submittedForms->isNotEmpty())
                            @foreach ($submittedForms as $submittedForm)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $submittedForm?->formTemplate?->name }}</td>
                                    <td>{{ $submittedForm?->user?->name }}</td>
                                    <td>{{ $submittedForm->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#submittedFormData{{ $submittedForm->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="submittedFormData{{ $submittedForm->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="submittedFormDataTitle{{ $submittedForm->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="submittedFormDataTitle{{ $submittedForm->id }}">
                                                                {{ __('Submitted Data') }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{{ __('S/N') }}</th>
                                                                        <th>{{ __('Name') }}</th>
                                                                        <th>{{ __('Value') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($submittedForm->formSubmissionData as $key => $formSubmissionData)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $formSubmissionData->formField?->label }}
                                                                            </td>
                                                                            <td>{{ $formSubmissionData->field_value }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">
                                                                {{ __('Close') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                    {{ $submittedForms->links('pagination::bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
@endsection
