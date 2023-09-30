<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseApiFormRequest;

class CountryStoreRequest extends BaseApiFormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'country_code' => 'required|string|max:10',  
            'name' => 'required|string',               
        ];
    }
}
