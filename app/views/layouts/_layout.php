<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="<?= $description ?>"/>
    <meta name="author" content="<?= $author ?>">
    <meta name="keywords" content="<?= $keywords ?>"/>

    <!--    <link rel="stylesheet" href="/public/css/normalize.css">-->
    <link rel="stylesheet" href="/public/css/main.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>

<body>
<?php require_once(VIEWS . "/components/menu/{$menu}.php") ?>

<?php echo $content; ?>

<?php require_once(VIEWS . "/components/footer/{$footer}.php") ?>

<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/main.js"></script>
<!--<script src="/public/js/ckeditor/ckeditor.js"></script>-->
<!--<script src="/public/js/jquery.validate.js"></script>-->

<?php
foreach ($scripts as $script) {
    echo $script;
};
?>

</body>
</html>