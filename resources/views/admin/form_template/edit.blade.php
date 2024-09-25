@extends('layouts.app')

@section('title', 'Edit Form Template')

@section('content')
    <h1>Edit Form Template</h1>

    <form action="{{ route('form_templates.update', $categoryId) }}" method="POST">
        @csrf
        @include('admin.form_templates.form')
        <button type="submit">Update Template</button>
    </form>
@endsection
