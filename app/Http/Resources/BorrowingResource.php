<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BorrowingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'book_id' => $this->book_id,
            'user_name' => $this->user?->name,
            'book_name' => $this->book?->title,
            'borrowed_from_date' => $this->borrowed_from_date,
            'borrowed_to_date' => $this->borrowed_to_date,
            'returned_at' => $this->returned_at,
            'borrowed_by' => $this->borrowed->name
        ];
    }
}
