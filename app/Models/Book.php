<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'title',
        'author',
        'genre_id',
        'ISBN',
        'description',
        'publication_year',
        'available_quantity',
        'total_quantity',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function scopeFilter($query, $filters)
    {
        $query->when(isset($filters['search']), function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')->orWhere('author', 'like', '%' . $search . '%');
        });
        $query->when(isset($filters['genre']), function ($query) use ($filters) {
            $query->whereHas('genre', function ($subQuery) use ($filters) {
                $subQuery->where('name', 'like', '%' . $filters['genre'] . '%');
            });
        });
        $query->when(isset($filters['branch']), function ($query) use ($filters) {
            $query->whereHas('branch', function ($subQuery) use ($filters) {
                $subQuery->where('name', 'like', '%' . $filters['branch'] . '%');
            });
        });
        $query->when(isset($filters['isbn']), function ($query) use ($filters) {
            $query->where('isbn', $filters['isbn']);
        });
    }
}
