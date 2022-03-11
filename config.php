<?php
try
{
    $bdd = new PDO('mysql:host=gmae.org;dbname=gmae;charset=utf8', 'root', '');
}catch(Exception $e)    
{
    die('Erreur'.$e->getmessage());
}
?>