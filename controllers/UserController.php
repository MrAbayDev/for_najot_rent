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
        loadView('profile', ['ads' => $ads], false);
    }
    public function show(int $id): void
    {
        $user       = (new User())->getUser($id);

        loadView('single-user', ['user' => $user]);
        loadView('profile', ['user' => $user]);
    }

}