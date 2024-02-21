<h2>Book restAPI | Laravel 10</h2>

<h3>Routes</h3>
<h4>Users (index / show / store / destroy):</h4>

- /api/users
- /api/users/{user}
- /api/users
- /api/users/{user}

<h4>Books (index / show):</h4>

- /api/books
- /api/books/{book}
- /api/books/{book}/borrow
- /api/books/{book}/return

<h3>Database - Artisan commands</h3>

- php artisan tinker --execute="\\App\\Models\\Book::factory()->count(60)->create()"
- php artisan tinker --execute="\\App\\Models\\User::factory()->count(5)->create()"

Seeders:
- book (60x books)
