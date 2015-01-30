<?php namespace Ep\Users;

use User;

class UserRepository
{

    /**
     *
     * persiste a user and the equivalent userType : Students or Professor...
     */
    public function save(User $user)
    {
        switch ($user->is_type) {
            case 'Student':
                $student = new \Student;
                $student->save();
                $student->user()->save($user);
                break;
            case 'Professor':
                $professor = new \Professor;
                $professor->save();
                $professor->user()->save($user);
                break;
            case 'Graduate':
                $graduate = new \Graduate;
                $graduate->save();
                $graduate->user()->save($user);
                break;
        }
        return $user;
    }

    /**
     * Fetch a user by their username.
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with('posts')->whereUsername($username)->first();;
    }
} 