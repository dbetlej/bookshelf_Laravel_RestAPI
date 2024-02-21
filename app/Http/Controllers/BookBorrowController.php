<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookBorrowController extends Controller
{
    /**
     * Borrow a book.
     * @param Book $book
     * @return JsonResponse
     */
    public function borrow(Book $book): JsonResponse
    {
        if ($book->status === Book::AVAILABLE) {
            $book->status = Book::BORROWED;
            $book->borrower_id = auth()->user()->id();
            $book->save();

            return response()->json(['message' => __('Książka wypożyczona')], 200);
        }

        return response()->json(['message' => __('Nie możesz wypożyczyć książki')], 400);
    }

    /**
     * Return a book.
     * @param Book $book
     * @return JsonResponse
     */
    public function return(Book $book): JsonResponse
    {
        if ($book->status === Book::BORROWED && $book->borrower_id === auth()->id()) {
            $book->status = Book::AVAILABLE;
            $book->borrower_id = null;
            $book->save();

            return response()->json(['message' => __('Ksiązka została zwrócona.')], 200);
        }

        return response()->json(['message' => __('Nie można zwrócić książki.')], 400);
    }
}
