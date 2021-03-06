<?php

namespace Controllers\ControllerPosts;
ob_start();

use Models\ModelPosts\PostClass;
require('./src/models/ModelPosts.php');

$posts = PostClass::GetAllPosts();
$articleId = PostClass::selectPostNumber();
$usernames = array();
$articlesID = array();


foreach ($articleId as $myids) {
    array_push($articlesID,  $myids->post_id);
}

foreach($posts as $post):
    $username = PostClass::getPoster($post->user_id);
    array_push($usernames, $username[0]->username);
endforeach;


if ($request == "/posts") {
    require_once('./src/views/ViewPosts.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $image['name'] = rand(1, 1000000).'.png';
            $uploadDirectory = './public/img/img-posts/';
            $ImgPathLanding = $uploadDirectory.'img-'.basename($image['name']);
            move_uploaded_file($image['tmp_name'], $ImgPathLanding);
            PostClass::addPost($_SESSION['user_id'], $_POST['title'],$_POST['post-content'], $ImgPathLanding);
            header('location:posts');
            ob_end_flush();
        } else {
            PostClass::addPost($_SESSION['user_id'], $_POST['title'],$_POST['post-content'], NULL);
            header('location:posts');
            ob_end_flush();
        }
    }
}



if (isset($separator[2])) {
    if (in_array($separator[2], $articlesID)){
        $idPost = $separator[2];
        $getSinglePost = PostClass::GetSinglePost($idPost);
        $getComments = PostClass::getComments($idPost);
        $Postuser = PostClass::getPoster($getSinglePost[0]->user_id);
        if (!empty($getComments)) {
            $Commentuser = PostClass::getPoster($getComments[0]->poster_id);
        }
        require_once('./src/views/ViewPostDetail.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['comment-content'])) {
                PostClass::addComment($_SESSION['user_id'], $idPost, $_POST['comment-content']);
                header('location:'.$idPost);
                ob_end_flush();
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['delete'])) {
                PostClass::DeleteComments($_SESSION['user_id'], $idPost);
                PostClass::DeletePost($_SESSION['user_id'], $idPost);
                PostClass::DeletePostImage($idPost);
                header('location:../posts');
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['edit-post-content'])) {
                PostClass::editPost($_POST['title'], $_POST['edit-post-content'],$idPost);
                header('location:../post/'.$idPost);
            }
        }

    } else{
        header('location:../error');
    }
}