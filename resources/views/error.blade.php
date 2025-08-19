@extends('layouts.main-layout')

@section('content')
    <div class="container my-5">
        <div class="card shadow-lg border-radius-lg p-4 text-center">
            <h1 class="text-gradient text-danger mb-3">{{ $status }}</h1>
            <h4 class="mb-3">Oops! Something went wrong.</h4>
            <p class="text-muted mb-4">{{ $message }}</p>
            <a href="{{ url()->previous() }}" class="btn btn-dark">Go Back</a>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Go Home</a>
        </div>
    </div>
@endsection