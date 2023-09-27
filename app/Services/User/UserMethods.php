<?php 

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserMethods
{ 
    public function register(array $values): User
    {                
        return User::create($values);
    }
   
    public function showAuthUser(): User
    {                
        return Auth::user(); 
    }

}
