@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/userLoginRegisterCard.css') }}">
@endpush


@section('content')
<div id="card">
    <h3>Register </h3>

    <form method="post">
        @csrf

        <input type="text" id="name" name="name" placeholder="Username" required>

        <input type="text" id="email" name="email" placeholder="Email" required>


        <input type="password" id="password" name="password" placeholder="Password" required>


        <button type="submit" class="button" registerAction>Register</button>
    </form>
</div>
@endsection()