<?php

namespace App\Repositories\User;

use App\User;

class UserRepository
{
    protected $user;

    public function __construct( User $user){
        $this->user = $user;
    }

    public function getAllUsers(){
        return $this->getUser()->paginate(10);
    }

    public function addNewUser(array $data){

        $data['verification_token'] = $this->getUser()::generateVerificationToken();
        return $this->getUser()->create($data);
    }

    public function updateUser(array $data){
        return $this->getUser()->update($data);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
