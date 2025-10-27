@extends('library_layouts.app')


@section('content')
<div class="container">
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Back</a>
    <h1>Book Details</h1>

    <div class="card">
        <div class="card-body">
            <h3>{{ $book->title }}</h3>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
            <p><strong>Category:</strong> {{ $book->category->name ?? 'N/A' }}</p>
        </div>
    </div>

    
</div>
@endsection
