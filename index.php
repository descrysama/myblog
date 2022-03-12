<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require 'public/home.php';
        break;
    case '/login':
        require __DIR__.'/src/controllers/ControllerUsers.php';
        break;
    case '/register':
        require __DIR__.'/src/controllers/ControllerUsers.php';
        break;
    case '/posts':
        require __DIR__.'/src/controllers/ControllerPosts.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;    
}

?>