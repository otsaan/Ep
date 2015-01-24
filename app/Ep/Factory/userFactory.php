<?php namespace Ep\Factory;

class UserFactory {


    /**
     * Creates a Student
     * @param array $attributes User + Student arguments
     * @return \Student
     */
    public static function createStudent(array $attributes)
    {
        $student = new \Student;
        $student->cne = isset($attributes['cne']) ? $attributes['cne'] : null;
        $student->save();

        $user = self::createUser($attributes);
        $student->user()->save($user);

        return $student;
    }


    /**
     * Creates a Professor
     * @param array $attributes User + Professor arguments
     * @return mixed
     */
    public static function createProfessor(array $attributes)
    {
        $professor = new \Professor;
        // why Professor has no arguments? think about one.
        $professor->save();

        $user = self::createUser($attributes);
        $professor->user()->save($user);

        return $professor;
    }


    /**
     * Creates a Graduate
     * @param array $attributes User + Graduate agruments
     * @return \Graduate
     */
    public static function createGraduate(array $attributes)
    {
        $graduate = new \Graduate;
        $graduate->graduation_year = isset($attributes['graduation_year']) ? $attributes['graduation_year'] : null;
        $graduate->job = isset($attributes['job']) ? $attributes['job'] : null;
        $graduate->save();

        $user = self::createUser($attributes);
        $graduate->user()->save($user);

        return $graduate;
    }


    /**
     * Helper function
     * @param $attributes
     * @return User
     */
    private static function createUser($attributes) {
        $user = new \User;

        $user->first_name = isset($attributes['first_name']) ? $attributes['first_name'] : null;
        $user->last_name = isset($attributes['last_name']) ? $attributes['last_name'] : null;
        $user->email = isset($attributes['email']) ? $attributes['email'] : null;
        $user->password = isset($attributes['password']) ? $attributes['password'] : null;
        $user->username = isset($attributes['username']) ? $attributes['username'] : null;
        $user->birthdate = isset($attributes['birthdate']) ? $attributes['birthdate'] : null;
        $user->phone = isset($attributes['phone']) ? $attributes['phone'] : null;
        $user->photo = isset($attributes['photo']) ? $attributes['photo'] : null;
        $user->bio = isset($attributes['bio']) ? $attributes['bio'] : null;
        $user->active = isset($attributes['active']) ? $attributes['active'] : false;

        return $user;
    }

}