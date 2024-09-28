@extends('layouts.app')

@section('title', 'Create Form Field')

@section('content')
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title w-100">{{ __('Create Form Template') }}</h3>
                <div class="w-100">
                    <a href="{{ route('admin.form.template.index', $formTemplate->category) }}"
                        class="btn btn-primary float-right">
                        <i class="fas fa-arrow-left mr-2"></i>{{ __('Back') }}
                    </a>
                </div>
            </div>
            <form role="form" action="{{ route('admin.form.field.store', $formTemplate) }}" method="POST">
                @csrf

                @include('admin.form_field.form')

                <div class="card-footer">
                    <x-button type="submit" class="btn btn-primary float-right" label="Submit" />
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let i = 1
        $(document).on('click', '#add-field', function() {
            i++
            $('#field-container').append(`<div class="row">
                                    <div class="col-lg-4">
                                        <x-input-group label="Field Label" type="text" name="inputs[${i}][label]" id="label${i}"
                                            placeholder="Enter your form field name" required />
                                    </div>
                                    <div class="col-lg-4">
                                        <x-select-group label="Field Type" name="inputs[${i}][field_type]" id="field_type${i}"
                                            placeholder="Select your form field type" required>
                                            @foreach ($fieldTypes as $type)
                                                <option value="{{ $type }}">{{ ucfirst($type->value) }}</option>
                                            @endforeach
                                        </x-select-group>
                                    </div>
                                    <div class="col-lg-3 margin_top_40">
                                        <div class="form-group text-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inputs[${i}][is_required]" id="is_required${i}"
                                                    value="1">
                                                <label class="form-check-label" for="is_required${i}">{{ __('Required') }}</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inputs[${i}][is_required]" id="is_required${i}"
                                                    value="0" checked>
                                                <label class="form-check-label" for="is_required${i}">{{ __('Optional') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 margin_top_40">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger btn-sm remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>`)
        });

        $(document).on('click', '.remove-field', function() {
            $(this).closest('.row').remove();
        });
    </script>
@endpush
