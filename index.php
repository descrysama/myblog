<?php
session_start();
$request = $_SERVER['REQUEST_URI'];

$separator = explode('/', $request);

if (!isset($separator[2])) {
    switch ($request) {
        case '/':
            if (isset($_SESSION['logged'])){
                require __DIR__.'/src/controllers/ControllerPosts.php';
                break;
            } else {
                require __DIR__.'/public/home.php';
                break;
            }
            case '/home':
                if (isset($_SESSION['logged'])){
                    header('location:/posts');
                } else {
                    header('location:/');
                }
        case '/login':
            if (isset($_SESSION['logged'])){
                require __DIR__.'/src/controllers/ControllerPosts.php';
                break;
            } else {
                require __DIR__.'/src/controllers/ControllerUsers.php';
                break;
            }
        case '/register':
            if (isset($_SESSION['logged'])){
                require __DIR__.'/src/controllers/ControllerPosts.php';
                break;
            } else {
                require __DIR__.'/src/controllers/ControllerUsers.php';
                break;
            }
        case '/profile':
            if (isset($_SESSION['logged'])){
                require __DIR__.'/src/controllers/ControllerUsers.php';
                break;
            } else {
                header('location:login');
            }
        case '/posts':
            require __DIR__.'/src/controllers/ControllerPosts.php';
            break;
        case '/disconnect':
            session_destroy();
            unset($_SESSION['logged']);
            require __DIR__.'/src/views/disconnected.php';
            sleep(1);
            header('location:login');
            break;
        default:
            http_response_code(404);
            require __DIR__ .'/src/views/404.php';
            break;  
    }   
} else {
    switch ($request) {
        case '/post/'.$separator[2]:
            require __DIR__.'/src/controllers/ControllerPosts.php';
            break;
    }
}




?>