@extends('layouts.app')

@section('title', 'Edit Form Template')

@section('content')
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title w-100">{{ __('Create Form Template') }}</h3>
                <div class="w-100">
                    <a href="{{ route('admin.form.template.index', $formTemplate->category) }}"
                        class="btn btn-primary float-right">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
            <form role="form" action="{{ route('admin.form.template.update', $formTemplate) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.form_template.form')

                <div class="card-footer">
                    <x-button type="submit" class="btn btn-primary float-right" label="Save & Update" />
                </div>
            </form>
        </div>
    </div>
@endsection
