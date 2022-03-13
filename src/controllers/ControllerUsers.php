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
                    $_SESSION['email'] = $email;
                    $_SESSION['user_id'] = UserClass::GetProfile($email)['user_id'];
                    header('location:/posts');
                } else {
                    echo 'email and/or password incorrect. re-try.';
                }
            } else {
                echo 'formulaire incorrect';
            }
        }
    }
    



} elseif ($request == '/register') 
{
    require ('./src/views/ViewRegister.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['retype-password'])){
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['retype-password'];
            if (UserClass::CorrectFormatRegister($email, $username, $password, $repassword) == true) {
                if (UserClass::CheckAvailability($email, $username) == true) {
                    UserClass::CreateUser($email, $username, $password);
                    sleep(2);
                    header('location:login');
                } else {
                    echo 'Email et/ou Username déjà utilisés.';
                }
                    
            }
        } else {
            echo 'formulaire incorrect';
        }
    }







} elseif ($request == '/profile')
{
    $infos = UserClass::GetProfile($_SESSION['email']);
    require ('./src/views/ViewProfile.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['email']) && isset($_POST['current-password']) && isset($_POST['new-password']) && isset($_POST['retype-new-password'])) {
            if (UserClass::VerifyCredentials($infos['email'], $_POST['current-password']) == true) {
                if ($_POST['new-password'] == $_POST['retype-new-password']) {
                    $newemail = $_POST['email'];
                    $newpassword = $_POST['new-password'];
                    UserClass::UpdateProfile($newemail, $newpassword, $infos['email']);
                    echo 'Changements pris en compte. Vous allez être deconnecté...';
                    sleep(3);
                    session_destroy();
                    header('location:login');
                } else{ 
                    echo 'New passwords don\'t match.';
                }
            } else { 
                echo 'Current password does not match.'; 
            } 
        } else { 
            echo 'Formulaire non complet.'; 
        }
    }
} else 
{
    require ('./src/views/404.php');
}