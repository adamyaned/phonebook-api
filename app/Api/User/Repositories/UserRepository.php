<?php

namespace App\Api\User\Repositories;

use App\Api\User\Models\User;
use App\Exceptions\NotFoundException;

class UserRepository
{
    /**
     * @var string
     */
    protected $model = User::class;

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->model::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => bcrypt($data['password'])
        ]);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws NotFoundException
     */
    public function get(int $id)
    {
        $user = $this->model::where('id', $id)->first();

        if (!$user) {
            throw new NotFoundException();
        }

        return $user;
    }

    /**
     * @param $data
     * @return mixed
     * @throws NotFoundException
     */
    public function getByEmailAndPassword($data)
    {
        $user = $this->model::where('email', $data['email'])->where('password', $data['password'])->first();

        if (!$user) {
            throw new NotFoundException();
        }

        return $user;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getByEmail($email)
    {
       return $this->model::where('email', $email)->first();
    }
}
