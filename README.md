<h2>Book restAPI | Laravel 10</h2>

<h3>Routes</h3>
Users (index / show / store / destroy):
- /api/users
- /api/users/{user}
- /api/users
- /api/users/{user}

Books (index / show):
- /api/books
- /api/books/{book}
- /api/books/{book}/borrow
- /api/books/{book}/return

<h3>Database</h3>
Artisan commands:
- php artisan tinker --execute="\\App\\Models\\Book::factory()->count(60)->create()"
- php artisan tinker --execute="\\App\\Models\\User::factory()->count(5)->create()"

Seeders:
- book (60x books)
