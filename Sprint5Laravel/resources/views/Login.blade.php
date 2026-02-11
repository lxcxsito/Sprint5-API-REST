@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/userLoginRegisterCard.css') }}">
@endpush

@section('content')
<div id="card">
    <h3>Login</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="text" id="name" name="name" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit" class="button">Login</button>
    </form>
</div>
@endsection