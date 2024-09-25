@extends('layouts.app')

@section('title', 'Fill Form')

@section('content')
    <h1>{{ $formTemplate->name }}</h1>

    <form action="{{ route('form_submissions.store', $formTemplate->id) }}" method="POST">
        @csrf
        @foreach ($formTemplate->formFields as $field)
            <label for="field_{{ $field->id }}">{{ $field->label }}</label>

            @if ($field->field_type === 'text')
                <input type="text" id="field_{{ $field->id }}" name="field_{{ $field->id }}"
                    @if ($field->is_required) required @endif>
            @elseif($field->field_type === 'textarea')
                <textarea id="field_{{ $field->id }}" name="field_{{ $field->id }}"
                    @if ($field->is_required) required @endif></textarea>
            @elseif($field->field_type === 'checkbox')
                <input type="checkbox" id="field_{{ $field->id }}" name="field_{{ $field->id }}">
            @elseif($field->field_type === 'radio')
                <!-- Add radio options based on field options -->
            @elseif($field->field_type === 'select')
                <select id="field_{{ $field->id }}" name="field_{{ $field->id }}">
                    <!-- Add select options based on field options -->
                </select>
            @endif
        @endforeach

        <button type="submit">Submit</button>
    </form>
@endsection
