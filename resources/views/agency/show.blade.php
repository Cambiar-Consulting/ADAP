@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $agency->name }}</h1>
    <p><strong>Description:</strong> {{ $agency->description }}</p>
    <p><strong>Location:</strong> {{ $agency->location }}</p>
    <p><strong>Contact:</strong> {{ $agency->contact }}</p>

    <h2>Services Offered</h2>
    <ul>
        @foreach($agency->services as $service)
            <li>{{ $service->name }}</li>
        @endforeach
    </ul>

    <a href="{{ route('agencies.index') }}" class="btn btn-primary">Back to Agencies</a>
</div>
@endsection