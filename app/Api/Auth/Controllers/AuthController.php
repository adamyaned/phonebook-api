<?php

namespace App\Api\Auth\Controllers;

use App\Api\Auth\Repositories\AuthRepository;
use App\Api\Auth\Requests\LoginRequest;
use App\Api\Auth\Requests\RegisterRequest;
use App\Api\User\Resources\UserResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    /**
     * @var AuthRepository
     */
    protected $authRepository;

    /**
     * AuthController constructor.
     * @param AuthRepository $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {
        $result = $this->authRepository->login($request->validated());

        return response()->json([
            'user' => new UserResource($result['user']),
            'token' => $result['token']
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successfully'
        ]);
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->authRepository->register($request->validated());

        return response()->json(new UserResource($user), Response::HTTP_CREATED);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthUser()
    {
        return response()->json(new UserResource(Auth::user()));
    }
}
