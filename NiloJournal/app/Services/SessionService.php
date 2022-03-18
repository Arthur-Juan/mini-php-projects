<?php

namespace App\Services;

use JetBrains\PhpStorm\NoReturn;

class SessionService
{



    public static function init(){

        //VERIFICA SE JA EXISTE UMA SESSÃO, SE NÃO, INICIA UMA
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
    }
    public static function unsetSession($session){
        self::init();

        unset($_SESSION[$session]);
    }

    #[NoReturn] public static function login($user){
        self::init();

        self::unsetSession('msg');
        $_SESSION['user'] = [
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
        ];

    }

    public static function logout(){
        self:self::init();

        //MATA A SESSÃO DO USUÁRIO
        unset($_SESSION['user']);
    }

    public static function getUserLogget(){
        self::init();

        return self::isLogged() ? $_SESSION['user'] : null;
    }

    //COLOCANDO QUALQUER ID AQUI EU ESTOU LOGADO???
    public static function isLogged(): bool
    {
        self::init();
        return isset($_SESSION['user']['id']);
    }

    public static function requireLogin(){
        if( self::isLogged()) {
            header('location: /');
        }
    }

    public static function requireLogout(): bool
    {
        if( ! self::isLogged()){
           return true;
        }

        return false;
    }

    public static function testSession() {
        return "<pre>" .print_r($_SESSION['user']) ."</pre>"; exit;
    }

    public static function getUserId(){
        return $_SESSION['user']['id'];
    }

}