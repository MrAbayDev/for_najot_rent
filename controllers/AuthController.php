<?php

declare(strict_types=1);

namespace Controller;

use App\Auth;
use App\User;

class AuthController
{

    public function login(): void
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        (new Auth())->login($username, $password);
    }

    public function register(): void
    {

        $userName   = $_POST['name'];
        $position   = $_POST['position'];
        $gender     = $_POST['gender'];
        $phone      = $_POST['phone'];
        $password   = $_POST['password'];
        if((new User())->isUserExists($userName)){
            echo "user already exists";
        }
        (new User())->createUser($userName, $position, $gender, $phone, $password);
            header("Location: /");
            exit();
    }
    public function showUserInfo():void{
        $userGender = (new User())->getUser();
        view('auth/createUser', ['userGender' => $userGender]);
    }

}