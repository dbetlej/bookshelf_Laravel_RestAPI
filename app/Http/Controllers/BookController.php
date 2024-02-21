<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSearchRequest;
use App\Models\Book;
use App\Services\BookService;

class BookController extends Controller
{
    protected BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BookSearchRequest $request)
    {
        $validated = $request->validated();

        if (isset($validated['search'])) {
            $searchTerm = $validated['search'];
            $books = $this->bookService->search($searchTerm);
        } else {
            $books = $this->bookService->getAllBooks();
        }

        return response()->json($books);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        if ($book->status == Book::BORROWED) {
            $book->load('borrower');
        }

        return response()->json($book);
    }
}
