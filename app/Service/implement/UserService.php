<?php

namespace App\Service\implement;

use App\Repository\Eloquent\UserEloquent;
use App\Service\UserServiceImplement;

class UserService implements UserServiceImplement
{
    protected $userRepository;
    public function __construct(UserEloquent $userEloquent)
    {
        $this->userRepository = $userEloquent;
    }

    public function index()
    {
        return $this->userRepository->index();
    }

    public function create($request)
    {
        return $this->userRepository->create($request);
    }

    public function show($id)
    {
       return $this->userRepository->show($id);
    }

    public function update($request, $id)
    {
        return $this->userRepository->update($request, $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
