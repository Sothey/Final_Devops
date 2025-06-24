<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTerrainRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'owner_id'       => ['required', 'exists:users,id'],
            'title'          => ['required', 'string', 'max:255'],
            'description'    => ['nullable', 'string'],
            'location'       => ['required', 'string', 'max:255'],
            'area_size'      => ['required', 'numeric', 'min:0'],
            'price_per_day'  => ['required', 'numeric', 'min:0'],
            'available_from' => ['nullable', 'date'],
            'available_to'   => ['nullable', 'date', 'after_or_equal:available_from'],
            'is_available'   => ['boolean'],
            'main_image'     => ['nullable', 'string', 'max:255'], // Use 'image' and 'mimes' if accepting file uploads
        ];
    }
}
