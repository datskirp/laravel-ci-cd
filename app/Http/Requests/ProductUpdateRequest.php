<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => ['integer'],
            'name' => ['string', 'required', 'max:255'],
            'manufacturer' => ['string', 'required', 'max:255'],
            'release' => ['date', 'required'],
            'cost' => ['numeric', 'required'],
            'category' => ['string', 'required', 'max:255'],
        ];
    }
}
