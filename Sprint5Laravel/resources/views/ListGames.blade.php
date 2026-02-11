@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<link rel="stylesheet" href="{{ asset('css/listObjects.css') }}">

@endpush

@section('content')
<div class="list-container">
    @foreach ($games as $game)
        <div class="game-card">
            <img src="{{ asset($game -> urlImage) }}" alt="CS" class="game-image">
            <h3> {{ $game -> title }}</h3>
            <p>{{ $game -> category -> name }}</p>
            <p>{{ $game -> description }}</p>
            <p>{{ $game -> price }}</p>
            @if (auth()->user())
                @if (!auth()->user()->games->contains($game->id))
                <form action="{{ route('buyGame.buy', $game) }}" method="POST">
                    @csrf
                    <button type="submit" class="button">Buy Game</button>
                </form>
                @else
                <p>Game is already buyed</p>
                @endif
            @endif
            <a href="{{ route('games.reviews', $game) }}" class="button">
                Reviews
            </a>
        </div>
    @endforeach
</div>
@endsection
