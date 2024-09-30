@extends('layouts.app')

@section('title', 'Form Templates')

@section('content')
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title w-100">{{ __('Form Templates') }}</div>
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
                                            @php
                                                $userId = Auth::user()->id;
                                                $submittedForm = $template
                                                    ->submittedForms()
                                                    ->where('user_id', $userId)
                                                    ->first();
                                                $isFormSubmitted = $submittedForm !== null;
                                            @endphp

                                            @if (!$isFormSubmitted)
                                                <a href="{{ route('user.submitted.form.show', $template) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Preview Form"
                                                    class="btn btn-success">
                                                    <i class="fa fa-file"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#submittedFormData{{ $template->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="submittedFormData{{ $template->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="submittedFormDataTitle{{ $template->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="submittedFormDataTitle{{ $template->id }}">
                                                                    {{ __('Submitted Data') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @if ($submittedForm && $submittedForm->formSubmissionData->isNotEmpty())
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
                                                                                    <td>
                                                                                        {{ $formSubmissionData->formField?->label ?? __('N/A') }}
                                                                                    </td>
                                                                                    <td>
                                                                                        {{ $formSubmissionData->field_value ?? __('N/A') }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                @else
                                                                    <p>{{ __('No submission data available.') }}</p>
                                                                @endif
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
                                            @endif
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
