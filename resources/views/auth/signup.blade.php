@extends('library_layouts.app')

@section('content')
<div class="container">
    <h2>Sign Up</h2>

    {{-- ✅ Show success message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ✅ Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('signup') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control" 
                value="{{ old('name') }}" 
                required
            >
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-control" 
                value="{{ old('email') }}" 
                required
            >
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input 
                type="password" 
                name="password" 
                class="form-control" 
                required
            >
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>

    <p class="mt-3">Already have an account? 
        <a href="{{ route('login.form') }}">Login</a>
    </p>
</div>
@endsection
