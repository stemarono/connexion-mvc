<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
</head>

<body>
    <div class="container">
        <?php require_once 'includes/header.php' ?>
        <div>
            <?= $content ?>
        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>
</body>

</html>