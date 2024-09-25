@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title w-100">{{ __('Create Category') }}</h3>
                <div class="w-100">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-primary float-right"><i class="fas fa-arrow-left mr-2"></i>{{ __('Back') }}</a>
                </div>
            </div>
            <form role="form" action="{{ route('admin.category.store') }}" method="POST">
                @csrf

                @include('admin.category.form')

                <div class="card-footer">
                    <x-button type="submit" class="btn btn-primary float-right" label="Submit" />
                </div>
            </form>
        </div>
    </div>
@endsection
