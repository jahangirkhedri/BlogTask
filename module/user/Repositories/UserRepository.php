<?php

namespace Module\user\Repositories;

use App\Repository\Repository;
use Module\user\Models\User;

class UserRepository extends Repository
{

    public function model()
    {
        return User::class;
    }
}
