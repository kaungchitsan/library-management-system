<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'book_id', 
        'borrowed_from_date', 
        'borrowed_to_date', 
        'returned_at',
        'borrowed_by'
    ];

    protected $dates = [
        'borrowed_from_date', 'borrowed_to_date', 'returned_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function borrowed()
    {
        return $this->belongsTo(User::class, 'borrowed_by', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
