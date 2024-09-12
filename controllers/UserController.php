<?php

declare(strict_types=1);

namespace Controller;

use App\Ads;
use App\Session;
use App\User;

class UserController
{
    public function loadProfile(): void
    {
        $ads = (new Ads())->getUsersAds((new Session())->getId());
        view('profile', ['ads' => $ads]);
    }
    public function show(int $id): void
    {
        $user       = (new User())->getUser($id);

        view('single-user', ['user' => $user]);
        view('profile', ['user' => $user]);
    }

}