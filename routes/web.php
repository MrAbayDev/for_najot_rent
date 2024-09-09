<?php

declare(strict_types=1);

use App\Router;
use Controller\AdController;
use Controller\BranchController;
use Controller\UserController;

Router::get('/',fn() => (new AdController())->home());

Router::get('/', fn() => loadController('home'));

Router::get('/ads/{id}', fn(int $id) => (new AdController())->show($id));
Router::get('/ads/create', fn() => (new AdController())->create());
Router::post('/ads/create', fn() => (new AdController())->store());

Router::get('/ads/update/{id}', fn(int $id) => (new AdController())->update($id));
Router::patch('/ads/update/{id}', fn(int $id) => (new AdController())->edit($id));


Router::get('/status/create', fn() => loadView('dashboard/create-status'));
Router::post('/status/create', fn() => loadController('createStatus'));

Router::get('/login', fn() => loadView('auth/login'), 'guest');
Router::post('/login', fn() => (new \Controller\AuthController())->login());

Router::get('/admin', fn() => loadView('dashboard/home'), 'auth');
Router::get('/profile', fn() => (new \Controller\UserController())->loadProfile(), 'auth');

Router::delete('/ads/delete/{id}',fn(int $id)=>(new AdController())->delete($id));

Router::get('/register', fn()=> loadView('auth/createUser'));
Router::post('/register', fn()=> (new \Controller\AuthController())->register());

Router::get('/branch/{id}', fn(int $id) => (new BranchController())->show($id));

Router::get('/branch/create', fn() => (new BranchController())->create());
Router::post('/branch/create', fn() => (new BranchController())->store());
Router::get('/branches',fn() => loadController('branches'));

Router::get('/users/{id}', fn(int $id) => (new UserController())->show($id));
Router::get('/users', fn() => loadController('users'));

Router::get('/search', fn() => (new AdController())->search());

Router::errorResponse(404, 'Not Found');
