<?php

namespace Controllers\ControllerUsers;
use Models\ModelUsers\UserClass;
require('./src/models/ModelUsers.php');

$request = $_SERVER['REQUEST_URI'];

if ($request == '/login')
{
    require('./src/views/ViewLogin.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (UserClass::CorrectFormatLogin($email, $password) == true){
                if (UserClass::VerifyCredentials($email, $password) == 1){
                    echo 'mdp correct';
                    $_SESSION['logged'] = true;
                    $_SESSION['username'] = UserClass::GetUsername($email);
                    header('location:/posts');
                } else {
                    $logError = 'email and/or password incorrect. re-try.';
                }
            } else {
                echo 'formulaire incorrect';
            }
        }
    }
    



} elseif ($request == '/register') 
{
    require ('./src/views/ViewRegister.php');
    







} else 
{
    require ('./src/views/404.php');
}


