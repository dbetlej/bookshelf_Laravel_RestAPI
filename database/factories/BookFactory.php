<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'publication_year' => $this->faker->year,
            'publisher' => $this->faker->company,
            'status' => Book::AVAILABLE,
            'borrower_id' => null,
        ];
    }

    /**
     * Define a state for borrowed books.
     *
     * @return Factory
     */
    public function borrowed(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Book::BORROWED,
                'borrower_id' => User::factory()->create()->id,
            ];
        });
    }

    /**
     * Define a state for reserved books.
     *
     * @return Factory
     */
    public function reserved(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Book::RESERVED,
            ];
        });
    }
}
