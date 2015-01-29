<?php namespace Ep\Registration;

use Laracasts\Commander\CommandHandler;
use Ep\Users\UserRepository;
use Laracasts\Commander\Events\DispatchableTrait;
use User;

class RegisterUserCommandHandler implements CommandHandler {
    use DispatchableTrait;

    protected $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {

        $user = User::register(
            $command->is_type, $command->email, $command->first_name, $command->last_name, $command->password, $command->username
        );

        $this->repository->save($user);
        $this->dispatchEventsFor($user);
        return $user;
    }
}