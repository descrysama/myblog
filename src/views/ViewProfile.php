

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
    <div class="container w-50 p-4">
        <h2>Profile : </h2>
        <h5><span>Role : </span><?php if ($infos['role'] == 0) {echo 'Utilisateur';} elseif ($infos['role'] == 1) {echo 'Admin';} ?></h5>
        <form action="" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="email">Email</span>
                </div>
                <input type="email" name="email" class="form-control" aria-label="email" aria-describedby="email" value="<?php echo $infos['email']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="current-password">Current Password</span>
                </div>
                <input type="password" name="current-password" class="form-control" aria-label="password" aria-describedby="password">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="new-password">New Password</span>
                </div>
                <input type="password" name="new-password" class="form-control" aria-label="password" aria-describedby="password">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="retype-new-password">Retype Password</span>
                </div>
                <input type="password" name="retype-new-password" class="form-control" aria-label="password" aria-describedby="password">
            </div>
            <input type="submit" class="btn btn-success" value="Submit Changes">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>