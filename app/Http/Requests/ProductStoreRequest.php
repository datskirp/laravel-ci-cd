<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'required', 'max:255'],
            'manufacturer' => ['string', 'required', 'max:255'],
            'release' => ['date', 'required'],
            'cost' => ['numeric', 'required', 'min:0'],
            'category' => ['string', 'required', 'max:255'],
        ];
    }
}
