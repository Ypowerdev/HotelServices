<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseApiFormRequest;

class ServiceStoreRequest extends BaseApiFormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:20', 
            'price' => 'required|numeric',
            'hotel_id' => 'required|integer'
        ];
    }
}
