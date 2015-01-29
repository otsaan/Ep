<?php namespace Ep\Users;

use User;

class UserRepository {
    /*
     * persiste a user
     */
    public function save(User $user)
    {
        return $user->save();
    }
} 