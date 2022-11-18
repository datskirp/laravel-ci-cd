<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
            'type' => ['string', 'required', 'max:255'],
            'deadline' => ['integer', 'required'],
            'cost' => ['numeric', 'required', 'min:0'],
            'category' => ['string', 'required', 'max:255'],
        ];
    }
}
