<?php

namespace App\Services;

use App\Models\Book;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class BookService
{
    public Book $book;
    public User $user;

    /**
     * @param Book $book
     */
    public function __construct(Book $book) {}

    /**
     * Retrieve all books from the database.
     *
     * @return LengthAwarePaginator
     */
    public function getAllBooks(): LengthAwarePaginator
    {
        return Book::paginate(config('app.pagination.max_items_per_page', 20));
    }

    public function search($search): LengthAwarePaginator
    {
        $booksQuery = Book::query();

        if ($search) {
            $booksQuery->where('title', 'like', "%$search%")
                       ->orWhere('author', 'like', "%$search%");
        }

        return $booksQuery->paginate(config('app.pagination.max_items_per_page', 20));
    }
}
