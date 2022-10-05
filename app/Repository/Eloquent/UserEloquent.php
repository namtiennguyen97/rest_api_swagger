<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\RepositoryInterface\UserRepositoryInterface;

class UserEloquent extends BaseEloquent implements UserRepositoryInterface
{
    public function getModel()
    {
        $user = User::class;
        return $user;
    }
}
