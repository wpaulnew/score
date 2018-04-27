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

    <link rel="stylesheet" href="/public/css/main.html.css">

</head>

<body>


<div class="wrapper">

    <div class="header">
        <?php require_once(VIEWS . "/components/menu/{$menu}.php") ?>

        <div class="header-control-elements" id="search-menu">
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="do-link-back"><span
                        class="lnr lnr-arrow-left"></span></a>
            <input type="text" class="input-search" value="Сделать что бы сюда падал текст поиска">
            <a href="#" class="do-link-filter" id="clear-input-search"><span class="lnr lnr-cross-circle"></span></a>
        </div>

        <div class="search-menu">
            <!-- SEARCH PRODUCT -->
            <div class="product-roll-list">

                <!-- Отдельный класс товара -->
                <div class="product product-roll-product">
                    <div class="product-img">
                        <img src="/public/img/product.png" alt="">
                    </div>
                    <a href="/men/hoodies/1" class="product-title"><h4>V-Shape</h4></a>
                    <p class="product-price">$24.40</p>

                    <!--            <a href="#" data-id="1" class="do-link-remove-from-saved"><span class="lnr lnr-cross-circle"></span></a>-->
                </div>
                <!-- /Отдельный класс товара -->

            </div>
            <!-- /SEARCH PRODUCT -->
        </div>

    </div>
    <div class="content">
        <?php echo $content; ?>
    </div>
    <div class="footer">
        <?php require_once(VIEWS . "/components/footer/{$footer}.php") ?>
    </div>

</div>

<div class="fixed-menu">
    <div class="fixed-menu-elements">
        <!-- do-icon это уже не ссылка действия, а иконка -->
        <a href="/all" class="do-menu-link"><span class="lnr lnr-shirt do-menu-icon"></span></a>
        <a href="/me/saved" class="do-menu-link"><span class="lnr lnr-bookmark do-menu-icon"></span></a>

        <a href="#" class="do-menu-link" id="open-search-menu"><span class="lnr lnr-magnifier do-menu-icon"></span></a>
        <a href="#" class="do-menu-link" id="close-search-menu"><span class="lnr lnr-cross do-menu-icon"></span></a>

        <?php if (\vendor\libs\Session::isSession("id")) : ?>
            <a href="/me" class="do-menu-link"><span class="lnr lnr-user do-menu-icon"></span></a>
        <?php else : ?>
            <a href="/login" class="do-menu-link"><span class="lnr lnr-user do-menu-icon"></span></a>
        <?php endif; ?>

        <?php if (\vendor\libs\Session::isSession("id")) : ?>
            <a href="/cart" class="do-menu-link"><span class="lnr lnr-cart do-menu-icon"></span></a>
        <?php else : ?>
            <a href="/login" class="do-menu-link"><span class="lnr lnr-cart do-menu-icon"></span></a>
        <?php endif; ?>
    </div>
</div>

<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/main.js"></script>

<!-- SEARCH MENU -->
<script>
    $("#open-search-menu").on("click", function () {
        $(".content").css("opacity", "0");
        $(".content").css("z-index", "-1");
        $("html").css("overflow-y", "hidden");
        $(".another-menu").css("display", "none");

        $("#open-search-menu").css("display", "none");
        $("#search-menu").css("display", "flex");
        $(".search-menu").css("display", "flex");
        $("#close-search-menu").css("display", "block");

        $(".input-search").val("").focus();


        $(".search-menu").html('<h1>Ничего не найдено</h1>');
    });
    $("#close-search-menu").on("click", function () {
        $(".content").css("opacity", "1");
        $(".content").css("z-index", "1");
        $("html").css("overflow-y", "scroll");
        $(".another-menu").css("display", "flex");

        $("#c-menu").css("display", "flex");

        $("#open-search-menu").css("display", "block");
        $("#search-menu").css("display", "none");
        $(".search-menu").css("display", "none");
        $("#close-search-menu").css("display", "none");
    });

</script>
<script>
    $("#clear-input-search").on("click", function () {
        $(".input-search").val("").focus();
    });

    $('.search-menu').scroll(function () {
//        $('.search-menu').append('<div>Handler for .scroll() called.</div>');
        $(".input-search").blur();
//        $(this).focus();
    });
    $(".input-search").on("click", function () {
        $(this).focus();
    });

    $(".input-search").keyup(function () {

        if  ($(this).val().length >= 1) {
            var text = $('.input-search').val();

            $.ajax({
                type: "POST",
                url: "/search",
                data: {
                    "search": text
                },
                success: function (reply) {
                    var json = JSON.parse(reply);
                    console.log(json);
                    var html = '';
                    $.each(json, function (index, product) {
                        html += '<div class="product product-roll-product"><div class="product-img"><img src="/public/img/' + product.img + '" alt=""></div><a href="/product/' + product.id + '" class="product-title"><h4>' + product.appellation + '</h4></a><p class="product-price">' + product.price + '</p></div>';
                    });
                    $(".search-menu").html(html);
                }
            });
        }else {
            $(".search-menu").html('<h1>Ничего не найдено</h1>');
        }
    });
</script>
<!-- /SEARCH MENU -->
<script>var DEFAULT_LINK = "192.168.0.89";</script>
<!-- ACTIVE-LINK -->
<script>
    $(document).ready(function(){
        $('.fixed-menu-elements a').each(function () {
            var location = window.location.href;
            var link = this.href;
//            console.log(link);
            if(location == link) {
//                console.log("active", link);
//                $(this).addClass('active');
            }
        });
    });
</script>
<!-- /ACTIVE-LINK -->
<?php
foreach ($scripts as $script) {
    echo $script;
};
?>

</body>
</html>