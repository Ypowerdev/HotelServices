<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Services\User\UserMethods;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthController extends Controller
{
    public function __construct(private UserMethods $userService)
    {
    }

    public function register(UserStoreRequest $request): JsonResource
    {
        $values = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ];

        return new UserResource($this->userService->register($values));
    }

    public function login(Request $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
           return new JsonResponse([
                'message' => 'Invalid credentials'
           ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $this->userService->createToken();

        $response = [
            'message' => 'Success',
            'token' => $token
        ];

        return new JsonResponse($response, 200);
    }

    public function user(): User
    {
        return $this->userService->showAuthUser();
    }

    public function logout(): JsonResponse
    {
        $this->userService->deleteToken();

        return new JsonResponse([
            'message' => 'Logged out successfully'
        ]);
    }
}
