<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTerrainRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'owner_id'       => ['sometimes', 'required', 'exists:users,id'],
            'title'          => ['sometimes', 'required', 'string', 'max:255'],
            'description'    => ['sometimes', 'nullable', 'string'],
            'location'       => ['sometimes', 'required', 'string', 'max:255'],
            'area_size'      => ['sometimes', 'required', 'numeric', 'min:0'],
            'price_per_day'  => ['sometimes', 'required', 'numeric', 'min:0'],
            'available_from' => ['sometimes', 'nullable', 'date'],
            'available_to'   => ['sometimes', 'nullable', 'date', 'after_or_equal:available_from'],
            'is_available'   => ['sometimes', 'boolean'],
            'main_image'     => ['sometimes', 'nullable', 'string', 'max:255'], // Use 'image' and 'mimes' if accepting file uploads
        ];
    }
}
