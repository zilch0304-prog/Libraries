@extends('library_layouts.app')


@section('content')
<div class="container">
     <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
    </form>
    <h1>Add Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
</div>
@endsection
