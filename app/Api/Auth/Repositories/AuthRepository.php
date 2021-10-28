<?php

namespace App\Api\Auth\Repositories;

use App\Api\User\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthRepository
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * AuthRepository constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $data
     * @return mixed
     * @throws ValidationException
     */
    public function register($data)
    {
        $user = $this->userRepository->getByEmail($data['email']);

        if (!$user) {
            return $this->userRepository->create($data);
        }

        throw ValidationException::withMessages([
            "credentials" => "User with this email exist."
        ]);
    }

    /**
     * @param $data
     * @return array
     * @throws ValidationException
     */
    public function login($data)
    {
        $user = $this->userRepository->getByEmail($data['email']);

        if (!Auth::attempt($data)) {
            throw ValidationException::withMessages([
                'credentials' => ['The provided credentials are incorrect.'],
            ]);
        }

        $result['user'] = $user;
        $result['token'] = $user->createToken('tokens')->plainTextToken;

        return $result;
    }
}
