@extends('layouts.app')

@section('title', 'Create Form Template')

@section('content')
    <h1>Create Form Template</h1>

    <form action="{{ route('form_templates.store', $categoryId) }}" method="POST">
        @csrf
        @include('admin.form_templates.form')
        <button type="submit">Create Template</button>
    </form>
@endsection
