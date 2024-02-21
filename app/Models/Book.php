<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    const AVAILABLE = 'available';
    const BORROWED = 'borrowed';
    const RESERVED = 'reserved';

    protected $fillable = [
        'title',
        'author',
        'publication_year',
        'publisher',
        'status',
        'borrower_id'
    ];

    /**
     * @return BelongsTo
     */
    public function borrower(): BelongsTo
    {
        return $this->belongsTo(User::class, 'borrower_id');
    }
}
