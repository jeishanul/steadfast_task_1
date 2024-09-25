@extends('layouts.app')

@section('title', 'Create Form Field')

@section('content')
    <h1>Create Form Field</h1>

    <form action="{{ route('form_fields.store', $formTemplateId) }}" method="POST">
        @csrf
        @include('admin.form_fields.form')
        <button type="submit">Create Field</button>
    </form>
@endsection
