<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Session;

class BorrowController extends Controller
{
    public function avail(Book $book)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return redirect()->route('signup.form');
        }

        if ($book->status === 'available' || $book->user_id === null) {
            $book->update([
                'status' => 'availed',
                'user_id' => $userId,
            ]);

            return redirect()->route('user.books.index')
                             ->with('success', 'Book availed successfully.');
        }

        return redirect()->route('user.books.index')
                         ->with('error', 'Book is not available.');
    }

    public function returnBook(Book $book)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return redirect()->route('signup.form');
        }

        if ($book->status === 'availed' && $book->user_id == $userId) {
            $book->update([
                'status' => 'available',
                'user_id' => null,
            ]);

            return redirect()->route('user.books.index')
                             ->with('success', 'Book returned successfully.');
        }

        return redirect()->route('user.books.index')
                         ->with('error', 'You cannot return this book.');
    }
}
