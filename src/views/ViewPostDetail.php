<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/index.css">
    <title>FabLab Lyon | Accueil</title>
</head>
<body>
    <?php

use Models\ModelPosts\PostClass;

 if (isset($_SESSION['logged'])) {
        require('./src/components/ComponentLoggedHeader.php');
    } else {
        require('./src/components/ComponentHeader.php');
    }
    ?>
    <div class="container-xxl d-flex justify-content-center align-items-center">
        <div class="container-xl text-center d-flex justify-content-center m-2">
            <div class="posts">
                <div class="detail-header">
                    <h1 id="titre"><span>Titre : </span><?php echo $getSinglePost[0]->title ?></h1>
                </div>
                <div class="detail-img">
                
                </div>
                <div class="detail-body">
                    <?php if ($getSinglePost[0]->image_path != NULL) {
                        require('./src/components/ComponentImg.php');
                    }
                    ?>
                    <p><?php echo $getSinglePost[0]->content ?></p>
                    <p>Author : <span><?php echo $Postuser[0]->username  ?></span></p>
                    <p>Date : <span><?php echo $getSinglePost[0]->date  ?></span></p>
                    <p><span style="font-style: italic;"><?php if($getSinglePost[0]->is_modified == 1) {echo 'edited';}?></span></p>
                    <?php if (isset($_SESSION['logged']) && $getSinglePost[0]->user_id == $_SESSION['user_id']): ?>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeletePost">
                    Delete...
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditPost">
                    Edit...
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="DeletePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete it ? This will be forever removed and it's comments too.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form action="" method="POST">
                                    <input type="hidden" name="delete" value="true">
                                    <input type="submit" class="btn btn-danger" value="Delete post">
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="EditPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form class="d-flex flex-column" action="" method="POST">
                                <input type="text" name="title" id="title" placeholder="titre">
                                <textarea name="edit-post-content" id="edit-post-content" rows="5" placeholder="Il etait une fois..."></textarea>
                                <input class="btn btn-success m-2" type="submit" value="Poster">
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="comment-container m-2">
                <?php  if (isset($_SESSION['logged'])) {
                        require('./src/components/ComponentSendComment.php');
                    }
                ?>
                <?php foreach ($getComments as $comment): ?>
                <div class="posts">
                    <div class="posts-header">
                        <p>Author: <span><?= $Commentuser[0]->username ?></span></p>
                    </div>
                    <div class="posts-body">
                        <?= $comment->content ?><br>
                        <span><?= $comment->date ?></span>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>