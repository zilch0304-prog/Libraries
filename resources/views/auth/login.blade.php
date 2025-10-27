@extends('library_layouts.app')

@section('content')
<div class="container">
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Login</button>
    </form>
    <p class="mt-3">Don’t have an account? <a href="{{ route('signup.form') }}">Sign Up</a></p>
</div>
@endsection
