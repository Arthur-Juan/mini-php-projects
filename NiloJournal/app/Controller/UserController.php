<?php

use App\Model\User;
use App\Services\SessionService;
use App\Services\UserService;

require_once __DIR__."/../Model/User.php";
require_once __DIR__."/../Services/UserService.php";
require_once __DIR__."/../Services/SessionService.php";

class UserController
{
    private UserService $userService;
    private SessionService $sessionService;

    public function __construct(){
        $this->userService = new UserService();
        $this->sessionService = new SessionService();
    }

    public function register(): Exception|bool
    {
        $user = new User();
        $user->name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $user->email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $user->password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);


        try {
            $newUser = $this->userService->createUser($user);
        if($newUser){
            $user->id = $newUser;
            header('location: /');
            SessionService::login($user);
        }

        }catch (\Exception $e) {
            return $e;

}
        return true;
    }

    /**
     * @throws Exception
     */
    public function login() {
            unset($_SESSION['msg']);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

            if(trim($password) === "" or trim($email) === "") {
                session_start();
                $_SESSION['msg'] = "Preencha todos os campos!";
                header('location: /login');
            }

            try {

                $user = $this->userService->login($email, $password);
                header('location: /');
                $this->sessionService->login($user);

            }catch (Exception $e){
                session_start();
                $_SESSION['msg'] = $e->getMessage();
                header('location: /login');
            }

    }

    public function logout(){
        $this->sessionService->logout();

        header('location: /');
    }

}