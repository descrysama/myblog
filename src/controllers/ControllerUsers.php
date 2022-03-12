<?php

namespace Controllers\ControllerUsers;
use Models\ModelPosts\UserClass;
require('./src/models/ModelUsers.php');

$request = $_SERVER['REQUEST_URI'];

if ($request == '/login'){
    require ('./src/views/ViewLogin.php');
} elseif ($request == '/register') {
    require ('./src/views/ViewRegister.php');
} else {
    require ('./src/views/404.php');
}


