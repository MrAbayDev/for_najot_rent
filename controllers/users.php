<?php

declare(strict_types=1);

$users = (new \App\User())->getUsers();
//dd($users);
loadView('users', ['users' => $users]);