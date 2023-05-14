<?php
namespace App\Repositories;
use App\Interfaces\UserInterface;
use App\Models\User;


class UserRepository implements UserInterface
{
    protected $modelUser;
    
    public function __construct(User $modelUser)
    {
        $this->modelUser = $modelUser;
    }

    public function register($data){
        return User::create($data);
    }

}

?>