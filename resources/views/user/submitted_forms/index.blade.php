@extends('layouts.app')

@section('title', 'My Submissions')

@section('content')
<h1>My Submissions</h1>

<ul>
    @foreach($submissions as $submission)
        <li>
            <a href="{{ route('form_submissions.show_submission', $submission->id) }}">
                Submission #{{ $submission->id }} ({{ $submission->submitted_at }})
            </a>
        </li>
    @endforeach
</ul>
@endsection
