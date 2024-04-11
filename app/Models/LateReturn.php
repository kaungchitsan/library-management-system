<?php

namespace App\Models;

use App\Models\FineRule;
use App\Models\Borrowing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LateReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrowing_id',
        'fine_rule_id',
        'fine_amount',
        'calculated_at'
    ];

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }

    public function fine_rule()
    {
        return $this->belongsTo(FineRule::class);
    }
}
