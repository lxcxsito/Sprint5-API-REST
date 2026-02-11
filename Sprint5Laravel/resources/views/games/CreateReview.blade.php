@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/createReview.css') }}">
@endpush

@section('content')
<div id="card">
    <h3>Create Review for</h3>
    <h4 style="color:#00ffea">{{ $game->title }}</h4>

    <form method="POST" action="{{ route('reviews.store', $game) }}">
        @csrf

        <textarea 
            name="description" 
            placeholder="Explain your experience on this game"
            required
        ></textarea>

        <select name="rating" required>
            <option value="">Rating</option>
            <option value="5">★★★★★</option>
            <option value="4">★★★★☆</option>
            <option value="3">★★★☆☆</option>
            <option value="2">★★☆☆☆</option>
            <option value="1">★☆☆☆☆</option>
        </select>

        <button type="submit" class="button">Send Review</button>
    </form>
</div>
@endsection
