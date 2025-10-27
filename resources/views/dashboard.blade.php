@extends('library_layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1>📚 Welcome to the Library System</h1>
        <p class="lead">Manage your categories and books easily in one place.</p>
    </div>

    <div class="row justify-content-center align-items-stretch">
        <!-- Categories Card -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-lg border-0 rounded-3 h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h4 class="card-title">📂 Categories</h4>
                    <p class="card-text flex-grow-1">
                        Create, update, and manage all book categories.
                    </p>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary mt-auto">
                        Manage Categories
                    </a>
                </div>
            </div>
        </div>

        <!-- Books Card -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-lg border-0 rounded-3 h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h4 class="card-title">📖 Books</h4>
                    <p class="card-text flex-grow-1">
                        Add new books, edit details, and organize your library.
                    </p>
                    <a href="{{ route('books.index') }}" class="btn btn-success mt-auto">
                        Manage Books
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
