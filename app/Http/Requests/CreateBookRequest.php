<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'genre_id' => 'required|exists:genres,id',
            'branch_id' => 'required|exists:branches,id',
            'ISBN' => 'nullable|string',
            'description' => 'nullable|string',
            'available_quantity' => 'required|integer|min:0',
            'total_quantity' => 'required|integer|min:0',
        ];
    }
}
