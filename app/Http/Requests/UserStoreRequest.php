<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseApiFormRequest;

class UserStoreRequest extends BaseApiFormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:20', 
            'email' => 'required|string|email',
            'password' => 'required|string|min:5|max:20',
        ];
    }
}
