@extends('user_layout.master')

{{-- @section('title', 'Register Here') --}}

@section( 'content')
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">

<div class="main">
    <h2>Login Form</h2>
    <form action="{{ route('login-form') }}" method="POST">
        @csrf

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" autocomplete="off" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" autocomplete="off"
               {{-- pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" --}}
               title="Password must contain at least one number, one alphabet, one symbol, and be at least 8 characters long"
               required />

        <button type="submit">Login</button>
    </form>
</div>
@endsection
