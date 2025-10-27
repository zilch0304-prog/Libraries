@extends('library_layouts.app')

@section('content')
<div class="container">
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Back</a>
    <h1 class="mb-4">➕ Add New Book</h1>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">📖 Book Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">✍️ Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
        </div>

        <div class="mb-3">
            <label for="published_year" class="form-label">📅 Published Year</label>
            <input type="number" name="published_year" class="form-control" value="{{ old('published_year') }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">🏷️ Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @empty
                    <option value="" disabled>No categories available. Please add one first.</option>
                @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Save</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">↩️ Cancel</a>
    </form>
</div>
@endsection
