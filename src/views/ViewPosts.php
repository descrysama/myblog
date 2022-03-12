

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/index.css">
    <title>FabLab Lyon | Accueil</title>
</head>
<body>
    <?php if (isset($_SESSION['logged'])) {
        require('./src/components/ComponentLoggedHeader.php');
    } else {
        require('./src/components/ComponentHeader.php');
    }?>
    
    <div class="container w-50">
    <?php if (isset($_SESSION['logged'])) {require('./src/components/ComponentSendPost.php');} ?>
        <?php foreach ($posts as $key=>$post): ?>
        <div class="posts">
            <div class="posts-header">
                <?= $usernames[$key]; ?>
            </div>
            <div class="posts-body">
                <?= $post->content ?>
            </div><span><?= $post->date ?></span>
        </div>
        <?php endforeach ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>