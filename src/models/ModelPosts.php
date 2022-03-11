<?php 

namespace Models\ModelPosts;
use PDO;

class PostClass {
    public $id;
    public $poster_id;
    public $content;
    public $date;

    public function __construct($id, $poster_id, $content, $date)
    {
        $this->id        = $id;
        $this->poster_id = $poster_id;
        $this->content   = $content;
        $this->date      = $date;
    }

    public function GetAllPosts() {
        require('./config.php');
        $req = $bdd->prepare('SELECT id, poster_id, content, date FROM posts');
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getAllMessages() {
        require('./config.php');
        $req = $bdd->prepare('SELECT id, poster_id, content, date FROM posts');
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}


?>