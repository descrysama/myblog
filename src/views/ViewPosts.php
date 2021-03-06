<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/index.css">
    <title>FabLab Lyon | Accueil</title>
</head>
<body>
    <?php if (isset($_SESSION['logged'])) {
        require('./src/components/ComponentLoggedHeader.php');
    } else {
        require('./src/components/ComponentHeader.php');
    }
    ?>
    <div class="container w-50 d-flex justify-content-center align-items-center">
        <h4>Bienvenue <span><?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];}?></span></h4>
        <div class="post-container">
            <?php if (isset($_SESSION['logged'])) {require('./src/components/ComponentSendPost.php');}?>
            <?php foreach ($posts as $key=>$post) :?>
            <div class="posts">
                <div>Title : <span><?= $post->title ?></span></div>
                <div class="posts-header"><span>Author : <?= $usernames[$key] ?></span></div>
                <div class="posts-body"><span>Article length : </span><?= strlen($post->content) ?> characters</div>
                <span><?= $post->date ?></span><br>
                <a href="./post/<?php echo $post->post_id?>">Voir détails...</a>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>