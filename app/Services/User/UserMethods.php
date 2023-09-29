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

    public function createToken(): string 
    { 
        $user = $this->showAuthUser();  
        $token = $user->createToken('token')->plainTextToken;

        return $token;
    } 

    public function deleteToken(): User 
    { 
        $user = $this->showAuthUser(); 

        $user->tokens->each(function ($token, $key) { 
            $token->delete();
        });

        return $user;
    }
}
