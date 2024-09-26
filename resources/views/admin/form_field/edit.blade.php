@extends('layouts.app')

@section('title', 'Edit Form Field')

@section('content')
    <h1>Edit Form Field</h1>

    <form action="{{ route('form_fields.update', $formTemplateId) }}" method="POST">
        @csrf
        @include('admin.form_fields.form')
        <button type="submit">Update Field</button>
    </form>
@endsection
