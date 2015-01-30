<?php namespace Ep\Users;

use User;

class UserRepository {

   

    /*
     * persiste a user and the equivalent userType : Students or Professor...
     */
    public function save(User $user)
    {
       return $user->save();
    }
} 