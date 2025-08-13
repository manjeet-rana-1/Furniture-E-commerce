@extends('user_layout.master')

{{-- @section('title', 'Register Here') --}}

@section( 'content')
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">

<div class="main">
    <h2>Registration Form</h2>
    <form method="POST" action="{{ url('/register') }}" autocomplete="off">
        @csrf

        <label for="first">Name:</label>
        <input type="text" id="first" name="name" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required  />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" autocomplete="off"
               {{-- pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" --}}
               title="Password must contain at least one number, one alphabet, one symbol, and be at least 8 characters long"
               required />

        <label for="repassword">Re-type Password:</label>
        <input type="password" id="repassword" name="password_confirmation" required />

        <label for="mobile">Contact:</label>
        <input type="text" id="phone" name="phone" maxlength="10" required />

        {{-- <label for="role">Role-Type:</label>
        <select id="role" name="role" required>
            <option value="">Select Your Role</option>
            <option value="male">Admin</option>
            <option value="female">User</option>
        </select> --}}

        <button type="submit">Registration</button>
    </form>
</div>
@endsection

