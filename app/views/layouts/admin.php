<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $description ?>"/>
    <meta name="author" content="<?= $author ?>">
    <meta name="keywords" content="<?= $keywords ?>"/>
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="/public/css/normalize.css">
    <link rel="stylesheet" href="/public/css/settings.css">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">-->

    <link rel="stylesheet" href="/public/css/admin.css">

</head>

<body>

<div class="wrapper">
<!--    <div class="header">-->
        <?php require_once(VIEWS . "/components/menu/{$menu}.php") ?>
<!--    </div>-->
    <div class="content">
        <?php echo $content; ?>
    </div>
    <div class="footer admin-footer">
        <?php require_once(VIEWS . "/components/footer/{$footer}.php") ?>
    </div>
</div>

<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<?php
foreach ($scripts as $script) {
    echo $script;
};
?>

</body>
</html>