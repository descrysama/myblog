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
    $username = PostClass::getCommentPoster($post->user_id);
    array_push($usernames, $username[0]->username);
endforeach;


if ($request == "/posts") {
    require_once('./src/views/ViewPosts.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        PostClass::addPost($_SESSION['user_id'], $_POST['title'],$_POST['post-content']);
        header('location:posts');
        ob_end_flush();
    }
}



if (isset($separator[2])) {
    if (in_array($separator[2], $articlesID)){
        $getSinglePost = PostClass::GetSinglePost($separator[2]);
        require_once('./src/views/ViewPostDetail.php');
    } else{
        header('location:../error');
    }
}