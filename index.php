<?php
session_start();
$request = $_SERVER['REQUEST_URI'];


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
                    require __DIR__.'/src/controllers/ControllerPosts.php';
                    break;
                } else {
                    require __DIR__.'/public/home.php';
                    break;
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
        case '/posts':
            require __DIR__.'/src/controllers/ControllerPosts.php';
            break;
        case '/disconnect':
            require __DIR__.'/src/views/disconnected.php';
            session_destroy();
            unset($_SESSION['logged']);
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/src/views/404.php';
            break;  
}


?>