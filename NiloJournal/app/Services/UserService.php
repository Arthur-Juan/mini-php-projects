<?php

namespace App\Services;

use App\Model\User;
use App\Repository\UserRepositoryPDO;
use Exception;

require_once __DIR__."/../Model/User.php";
require_once __DIR__."/../Repository/UserRepositoryPDO.php";

class UserService
{

    private UserRepositoryPDO $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepositoryPDO();
    }

    /**
     * @throws Exception
     */
    public function createUser(User $user):false|string{

//        if($this->getUserByEmail($user->email)) {
//               ;
//            }

        $user->password = password_hash($user->password, PASSWORD_DEFAULT);

        return $this->userRepository->create($user);


    }

    /**
     * @throws Exception
     */
    public function login($email, $password): object
    {
        $user = $this->getUserByEmail($email);
        if( ! $user) {
            throw new Exception('Usuário ou senha inválidos!');
        }

        if( ! password_verify($password, $user->password)){

            throw new Exception('Usuário ou senha inválidos!');

        }

        return $user;

    }

    /**
     * @throws Exception
     */
    public function getUserByEmail($email): object|false
    {
        $user = $this->userRepository->getUserByEmail($email);
        if($user){
            return $user;
        }
        return false;

    }

    public function getUserById($id){

    }



}