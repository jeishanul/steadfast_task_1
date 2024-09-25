@extends('layouts.app')

@section('title', 'Submission Details')

@section('content')
    <h1>Submission #{{ $submission->id }}</h1>

    <ul>
        @foreach ($submission->formSubmissionData as $data)
            <li>{{ $data->formField->label }}: {{ $data->field_value }}</li>
        @endforeach
    </ul>
@endsection
