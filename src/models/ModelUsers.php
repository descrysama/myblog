<?php

namespace Models\ModelUsers;
use PDO;

class UserClass {
    public $user_id;
    public $email;
    public $username;
    public $password;
    public $role;

    public function __construct($user_id, $email, $username, $password, $role) {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public static function CorrectFormatLogin($email, $password) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) == true && strlen($email) <= 64) {
                if (strlen($password) <= 64) {
                    return true;
                }
            }
    }

    public static function CorrectFormatRegister($email, $username, $password, $repassword) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) == true && strlen($email) <= 64) {
                if (strlen($username) <= 64) {
                    if (strlen($password) <= 64) {
                        if ($password == $repassword) {
                            return true;
                        }else { return false;}
                    }else { return false;}
                } else { return false;}
            } else { return false;}
    }

    public static function VerifyCredentials($email, $password) {
        require('./config.php');
        $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array(strtolower($email)));
        $fetch = $req->fetch();
        $rowcount = $req->rowCount();
        if ($rowcount == 1) {
            if (md5($password) == $fetch['password']) {
                $correctlogin = 1;
            } else {
                $correctlogin = 0;
            }
            if ($correctlogin == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function GetUsername($email) {
        require('./config.php');
        $req = $bdd->prepare('SELECT username FROM users WHERE email = ?');
        $req->execute(array($email));
        $result = $req->fetch();
        return $result['username'];
    }

    public static function GetProfile($email) {
        require('./config.php');
        $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($email));
        $result = $req->fetch();
        return $result;
    }

    public static function UpdateProfile($newemail, $newpassword, $oldemail) {
        require('./config.php');
        $req = $bdd->prepare('UPDATE users SET email = ?, password = ? where email = ?');
        $req->execute(array(
            $newemail,
            md5($newpassword),
            $oldemail
        ));
    }

    public static function CheckAvailability($email, $username) {
        require('./config.php');
        $req = $bdd->prepare('SELECT email, username FROM users WHERE email = ? OR username = ?');
        $req->execute(array(
            strtolower($email),
            strtolower($username)
        ));
        $row = $req->rowCount();
        if ($row == 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function CreateUser($email, $username, $password) {
        require('./config.php');
        $req = $bdd->prepare('INSERT INTO users (email, username, password) VALUES (?,?,?)');
        $req->execute(array(
            strtolower($email),
            strtolower($username),
            md5($password)
        ));
    }
}