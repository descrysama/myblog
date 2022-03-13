<?php
try
{
    $bdd = new PDO('mysql:host=p17blog.com;dbname=myblog;charset=utf8', 'root', '');
}catch(Exception $e)    
{
    die('Erreur'.$e->getmessage());
}
