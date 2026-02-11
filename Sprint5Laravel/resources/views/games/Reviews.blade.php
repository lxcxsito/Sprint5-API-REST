@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/reviews.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('content')
<div class="reviews-page">

    <h2>{{ $game->title }} – Reviews</h2>

    <img src="{{ asset($game->urlImage) }}" class="game-cover">

    <div class="reviews-container">
    @foreach ($reviews as $index => $review)
    <div class="review-user" style="animation-delay: {{ $index * 0.1 }}s">

        <img src="{{ asset($review->user->avatar) }}" class="avatar">

        <p class="username">{{ $review->user->name }}</p>

        <p class="review-text">
            {{ $review->comment }}
        </p>

        <div class="stars">
            @for ($i = 1; $i <= 5; $i++)
                <span class="fa fa-star {{ $i <= $review->rating ? 'checked' : '' }}"></span>
            @endfor
        </div>

    </div>
    @endforeach
</div>

</div>
@endsection

