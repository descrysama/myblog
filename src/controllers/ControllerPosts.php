<?php

namespace Controllers\ControllerPosts;
ob_start();

use Models\ModelPosts\PostClass;
require('./src/models/ModelPosts.php');

$posts = PostClass::GetAllPosts();
$usernames = array();
foreach($posts as $post):
    $username = PostClass::getCommentPoster($post->user_id);
    array_push($usernames, $username[0]->username);
endforeach;

require_once('./src/views/ViewPosts.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    PostClass::addPost($_SESSION['user_id'], $_POST['post-content']);
    header('location:posts');
    ob_end_flush();
}