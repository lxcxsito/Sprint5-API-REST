@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('content')
<h1>My Games</h1>
<div class="cart-container">
    @foreach ($games as $game)
        <div class="game-card">
            <img src="{{ asset($game->urlImage) }}" alt="{{ $game->title }}">
            <h3>{{ $game->title }}</h3>
            <p>Price: {{ $game->price }}</p>
            <a href="{{ route('games.reviews', $game) }}" class="button">
                Reviews
            </a>
             <a href="{{ route('reviews.create', $game) }}" class="button">
                Create Review
            </a>
        </div>
    @endforeach
</div>
@endsection
