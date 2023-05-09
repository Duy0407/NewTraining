<?php
namespace App\Services;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser($r)
    {
        $data['name'] = $r['name'];
        $data['email'] = $r['email'];
        $data['password'] = bcrypt($r['password']);
        return $this->userRepository->register($data);
    }
}

?>