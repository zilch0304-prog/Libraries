@extends('library_layouts.app')

@section('content')
<div class="container">
    <h1>User Book List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
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
                <th width="150px">Actions</th>
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

                    {{-- STATUS --}}
                    <td>
                        @if($book->status === 'availed')
                            <span class="badge bg-danger">Not Available</span>
                        @else
                            <span class="badge bg-success">Available</span>
                        @endif
                    </td>

                    {{-- ACTIONS --}}
                    <td>
                        @if($book->status === 'available')
                            {{-- Borrow button --}}
                            <form action="{{ route('books.avail', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Borrow</button>
                            </form>
                        @elseif($book->status === 'availed' && $book->user_id === session('user_id'))
                            {{-- Return button (only for the borrower) --}}
                            <form action="{{ route('books.return', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">Return</button>
                            </form>
                        @else
                            {{-- Not available for other users --}}
                            <span class="text-muted">Not Available</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
