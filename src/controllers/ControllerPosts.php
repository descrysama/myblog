<?php

namespace Controllers\ControllerPosts;

use Models\ModelPosts\PostClass;
require('./src/models/ModelPosts.php');

$posts = PostClass::GetAllPosts();




require('./src/views/ViewPosts.php');