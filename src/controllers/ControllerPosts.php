<?php

use Models\ModelPosts\PostClass;
require('./src/models/ModelPosts.php');



$test = new PostClass('1','1','1','1');
$posts = $test->getAllMessages($test->poster_id);



require('./src/views/ViewPosts.php');