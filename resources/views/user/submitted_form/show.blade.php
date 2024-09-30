@extends('layouts.app')

@section('title', 'Fill Form')

@section('content')
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="w-100">
                    <h3 class="card-title text-bold w-100">{{ $formTemplate->name }}</h3>
                    @if ($formTemplate->description)
                        <p class="card-description text-danger w-100">{{ $formTemplate->description }}</p>
                    @endif
                </div>
                <div class="w-100">
                    <a href="{{ route('user.submitted.form.show', $formTemplate) }}" class="btn btn-primary float-right"><i
                            class="fas fa-arrow-left mr-2"></i>{{ __('Back') }}</a>
                </div>
            </div>
            <form role="form" action="{{ route('user.form.data.store', $formTemplate) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        @foreach ($formTemplate->formFields as $key => $field)
                            @if ($field->type->value == 'textarea')
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="{{ $field->name }}">{{ $field->label }} {!! $field->is_required == 1 ? '<span class="text-danger">*</span>' : '' !!}</label>
                                        <textarea type="{{ $field->type }}" class="form-control" name="formFields[{{ $field->id }}]{{ $field->name }}"
                                            id="{{ $field->name }}" placeholder="Enter your {{ $field->label }}" rows="5"
                                            {{ $field->is_required == 1 ? 'required' : '' }}></textarea>
                                    </div>
                                </div>
                            @elseif ($field->type->value == 'checkbox')
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" name="formFields[{{ $field->id }}]{{ $field->name }}" value="yes"
                                            class="form-check-input" id="{{ $field->name }}">
                                        <label class="form-check-label" for="{{ $field->name }}"
                                            {{ $field->is_required == 1 ? 'required' : '' }}>{{ $field->label }}
                                            {!! $field->is_required == 1 ? '<span class="text-danger">*</span>' : '' !!}</label>
                                    </div>
                                </div>
                            @else
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="{{ $field->name }}">{{ $field->label }}
                                            {!! $field->is_required == 1 ? '<span class="text-danger">*</span>' : '' !!}</label>
                                        <input type="{{ $field->type }}" class="form-control"
                                            name="formFields[{{ $field->id }}]{{ $field->name }}"
                                            id="{{ $field->name }}" placeholder="Enter your {{ $field->label }}"
                                            {{ $field->is_required == 1 ? 'required' : '' }}>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <x-button type="submit" class="btn btn-primary float-right" label="Submit" />
                </div>
            </form>
        </div>
    </div>
@endsection
