@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset(path: 'css/createGame.css') }}">
@endpush

@section('content')
@if (auth()->check() && auth()->user()->role === 'admin')
<div id="card">
    <h3>Create Game</h3>

   <form method="POST"
      action="{{ route('createGame.store') }}"
      enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Game name" required>
    <input type="text" name="description" placeholder="Game description" required>
    <input type="number" name="price" placeholder="Price" required>

    <label class="file-upload">
        <input type="file" name="coverImage" accept="image/*" required>
        <span>Add cover image</span>
    </label>

    <button type="submit" class="button">Create</button>
</form>
</div>
@endif
@endsection