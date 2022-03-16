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
        $req = $bdd->prepare('SELECT post_id, user_id, title, content, date FROM posts ORDER BY post_id DESC');
        $req->execute();
        $GetAllPostsResult = $req->fetchAll(PDO::FETCH_OBJ);
        return $GetAllPostsResult;
    }

    public static function GetSinglePost($post_id) {
        require('./config.php');
        $req = $bdd->prepare('SELECT post_id, user_id, title, content, date FROM posts WHERE post_id = ?');
        $req->execute(array(
            $post_id
        ));
        $GetSinglePostsResult = $req->fetchAll(PDO::FETCH_OBJ);
        return $GetSinglePostsResult;
    }

    public static function GetComments($post_id) {
        require('./config.php');
        $req = $bdd->prepare('SELECT * FROM posts INNER JOIN comments WHERE posts.post_id = ? = comments.target_id');
        $req->execute(array(
            $post_id
        ));
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

    public static function addPost($poster_id, $title, $content) {
        require('./config.php');
        if (strlen($content) <= 600) {
            if (strlen($title) <= 50) {
                $req = $bdd->prepare('INSERT INTO posts (user_id, title, content) VALUES (?,?,?)');
                $req = $req->execute(array(
                $poster_id,
                $title,
                $content
                ));
            }
        } else { echo 'Invalid Post. Check length or character type.';}
    }

    public static function selectPostNumber() {
        require('./config.php');
        $req = $bdd->prepare('SELECT post_id FROM posts');
        $req->execute();
        $Articles_id = $req->fetchAll(PDO::FETCH_OBJ);
        return $Articles_id;
    }
}