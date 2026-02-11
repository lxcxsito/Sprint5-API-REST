@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<link rel="stylesheet" href="{{ asset('css/listObjects.css') }}">

@endpush

@section('content')
<div class="list-container">
        <div class="game-card">
            <p class="text-warning"> Are you sure you want to buy this game ?</p>
            <img src="{{ asset($game -> urlImage) }}" alt="CS" class="game-image">
            <h3> {{ $game -> title }}</h3>
            <p>{{ $game -> description }}</p>
            <p>{{ $game -> price }}</p>
            @if (auth()->user())
                @if (!auth()->user()->games->contains($game->id))
                  <a href="{{ route('buyGame.show', $game) }}" class="button">Buy Game</a>  
                @endif
            @endif
            <a href="{{ route('games.reviews', $game) }}" class="button">
                Reviews
            </a>
        </div>
</div>
@endsection