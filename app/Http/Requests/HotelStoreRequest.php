<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseApiFormRequest;

class HotelStoreRequest extends BaseApiFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'adress' => 'required|string|min:5|max:40',
            'coordinates' => 'required|numeric',
            'city_id' => 'required|integer',
            'name' => 'required|string'
        ];
    }
}
