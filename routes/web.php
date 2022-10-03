<?php
    require_once '../app/Controllers/UserController.php';
    require_once '../app/Controllers/PageController.php';
    require_once '../app/Controllers/AuthController.php';

    require_once '../app/Router/Router.php';

    $router = new Router;

    $router->post('/login', [new AuthController, 'login']);
    $router->post('/logout', [new AuthController, 'logout']); 

    $router->get('/', [new PageController, 'index']);
    $router->get('/user/show', [new UserController, 'show']);
    $router->post('/user/create', [new UserController, 'create']);
    $router->get('/user/check', [new UserController, 'single']);

    $router->get('/about', [new PageController, 'about']);
    $router->get('/signup', [new PageController, 'signup']);
    $router->get('/signin', [new PageController, 'signin']);
    $router->get('/profile', [new PageController, 'profile']);
    $router->get('/edit-profile', [new PageController, 'profile_edit']);
    $router->get('/quots', [new PageController, 'quots']);

    $router->addNotFoundHandler([new PageController, 'error']);
    $router->run();
