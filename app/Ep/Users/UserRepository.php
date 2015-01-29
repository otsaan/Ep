<?php namespace Ep\Users;

use User;

class UserRepository {

    protected $userFactory;

    function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }


    /*
     * persiste a user and the equivalent userType : Students or Professor...
     */
    public function save(User $user)
    {

        return $user->save();
    }
} 