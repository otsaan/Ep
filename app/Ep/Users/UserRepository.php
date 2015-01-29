<?php namespace Ep\Users;

use Ep\Factory\UserFactory;
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

        switch ($user->is_type) {
            case 'Student':
                $user = $this->userFactory->createProfessor($user->getAttributes());
                break;
            case 'Professor':
                $user = $this->userFactory->createProfessor($user->getAttributes());
                break;
            case 'Graduate':
                $user = $this->userFactory->createGraduate($user->getAttributes());
                break;
        }
        return $user;
    }
} 