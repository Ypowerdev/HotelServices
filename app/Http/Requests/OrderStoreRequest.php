<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseApiFormRequest;

class OrderStoreRequest extends BaseApiFormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'service_id' => 'required|integer',           
        ];
    }
}
