@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
<section class="hero">
    <video autoplay muted loop playsinline class="hero-video">
        <source src="{{ asset($randomVideo) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <img class="logo"  src="{{ asset('images/logo.png') }}">
        <p>Discover the best games and grab your favorite games now!</p>
    </div>
</section>
@endsection