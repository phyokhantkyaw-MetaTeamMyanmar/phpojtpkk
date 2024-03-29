<?php

namespace App\Http\Services;

use App\Contracts\Services\userInterface;
use App\Http\Dao\UserDao;

class UserService implements userInterface
{
    private $UserDao;
    public function __construct(UserDao $userDao)
    {
        $this->UserDao = $userDao;
    }
    public function index()
    {
        return $this->UserDao->index();
    }
    public function save($request)
    {
        return $this->UserDao->save($request);
    }
    public function deleteuser($id)
    {
        return $this->UserDao->deleteuser($id);
    }
    public function updatepassword($id, $request)
    {
        return $this->UserDao->updatepassword($id, $request);
    }
    public function findUserById($id)
    {
        return $this->UserDao->findUserById($id);
    }
    public function updateProfile($id, $request)
    {
        return $this->UserDao->updateProfile($id, $request);
    }
}
