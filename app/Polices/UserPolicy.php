<?php

namespace Socieboy\Jupiter\Polices;

use App\User;

class UserPolicy
{
    /**
     * Only User administrators can create new Users.
     * @param User $user
     * @return mixed
     */
    public function create(User $user){
        return true;
    }

    public function update(User $user){
    }

}