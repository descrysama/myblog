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

    public static function GetAllPosts() {
        require('./config.php');
        $req = $bdd->prepare('SELECT post_id, user_id, content, date FROM posts ORDER BY post_id DESC');
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

    public static function getCommentPoster($user_id) {
        require('./config.php');
        $req = $bdd->prepare('SELECT * FROM users WHERE user_id = ?');
        $req->execute(array($user_id));
        $getCommentPosterresult = $req->fetchAll(PDO::FETCH_OBJ);
        return $getCommentPosterresult;
    }

    public static function addPost($user_id, $content) {
        require('./config.php');
        $req = $bdd->prepare('INSERT INTO posts (user_id, content) VALUES (?,?)');
        $req = $req->execute(array(
            $user_id,
            $content
        ));
        unset($_POST);
        header('location:/posts');
    }
}


?>