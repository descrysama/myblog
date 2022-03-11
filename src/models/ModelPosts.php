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
        $GetAllPostsResult = $req->fetchAll(PDO::FETCH_OBJ);
        return $GetAllPostsResult;
    }

    public function getAllMessages($post_id) {
        require('./config.php');
        $req = $bdd->prepare('SELECT id, poster_id, content, date FROM comments WHERE post_id = ?');
        $req->execute(array($post_id));
        $getAllMessagesresult = $req->fetchAll(PDO::FETCH_OBJ);
        return $getAllMessagesresult;
    }

    public function getCommentPoster($poster_id) {
        require('./config.php');
        $req = $bdd->prepare('SELECT pseudo FROM users WHERE id = ?');
        $req->execute(array($poster_id));
        $getCommentPosterresult = $req->fetchAll(PDO::FETCH_OBJ);
        return $getCommentPosterresult;
    }
}


?>