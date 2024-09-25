@extends('layouts.app')

@section('title', 'Form Templates')

@section('content')
<h1>Form Templates</h1>

<a href="{{ route('admin.form.template.create', $category) }}">Create New Form Template</a>

<ul>
    @foreach($formTemplates as $template)
        <li>
            <h2>{{ $template->name }}</h2>
            <p>{{ $template->description }}</p>
            <a href="{{ route('form_templates.edit', $template->id) }}">Edit</a>
            <form action="{{ route('form_templates.destroy', $template->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
