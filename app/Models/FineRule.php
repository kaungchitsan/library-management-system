<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FineRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'condition',
        'fine_amount',
    ];
}
