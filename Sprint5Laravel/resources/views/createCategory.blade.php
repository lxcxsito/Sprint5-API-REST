@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset(path: 'css/createGame.css') }}">
@endpush

@section('content')
@if (auth()->check() && auth()->user()->role === 'admin')
<div id="card">
    <h3>Create Category</h3>
   <form method="POST"
      action="{{ route('createCategory.createCategory') }}"
      enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Category name" required>

    <button type="submit" class="button">Create</button>
</form>
</div>
@endif


@endsection