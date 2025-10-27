@extends('library_layouts.app')

@section('content')
<div class="container">
    <h1>Books</h1>

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add Book</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Category</th>
                <th>Status</th>
                <th width="250px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>{{ $book->category->name ?? 'N/A' }}</td>
                    <td>
                        @if($book->user_id)
                            <span class="badge bg-danger">Availed</span>
                        @else
                            <span class="badge bg-success">Available</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        {{-- Delete --}}
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this book?')">Delete</button>
                        </form>

                        {{-- Avail / Return (Users only) --}}
                        @if(!session('is_admin'))
                            @if(!$book->user_id)
                                <form action="{{ route('books.avail', $book->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Avail</button>
                                </form>
                            @else
                                <form action="{{ route('books.return', $book->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary btn-sm">Return</button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
