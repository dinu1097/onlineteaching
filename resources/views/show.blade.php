@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <p><strong>Standard:</strong> {{ $course->standard }}</p>
    <p><strong>Subject:</strong> {{ $course->subject }}</p>
    <p><strong>Price:</strong> ${{ $course->price }}</p>
    <!-- Add more details as needed -->
</div>
@endsection
