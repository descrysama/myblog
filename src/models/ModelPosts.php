<?php 

namespace Models\ModelPosts;
use PDO;

class PostClass {
    public $id;
    public $poster_id;
    public $content;
    public $date;

    public function __construct($poster_id, $content)
    {
        $this->poster_id = $poster_id;
        $this->content   = $content;
    }

    public static function GetAllPosts() {
        require('./config.php');
        $req = $bdd->prepare('SELECT post_id, user_id, content, date FROM posts ORDER BY post_id DESC');
        $req->execute();
        $GetAllPostsResult = $req->fetchAll(PDO::FETCH_OBJ);
        return $GetAllPostsResult;
    }

    public static function GetComments() {
        require('./config.php');
        $req = $bdd->prepare('SELECT * FROM posts INNER JOIN comments WHERE posts.post_id = comments.target_id');
        $req->execute();
        $GetCommentsResult = $req->fetchAll(PDO::FETCH_OBJ);
        return $GetCommentsResult;
    }


    public static function getCommentPoster($user_id) {
        require('./config.php');
        $req = $bdd->prepare('SELECT * FROM users WHERE user_id = ?');
        $req->execute(array($user_id));
        $getCommentPosterresult = $req->fetchAll(PDO::FETCH_OBJ);
        return $getCommentPosterresult;
    }

    public static function addPost($poster_id, $content) {
        require('./config.php');
        if (strlen($content) <= 280) {
            $req = $bdd->prepare('INSERT INTO posts (user_id, content) VALUES (?,?)');
            $req = $req->execute(array(
                $poster_id,
                $content
            ));
        } else { echo 'Invalid Post. Check length or character type.';}
    }
}