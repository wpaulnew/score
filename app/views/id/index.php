<div class="header-control-elements border-for-header another-menu">
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="do-link-back"><span class="lnr lnr-arrow-left"></span></a>
    <a href="/"><img src="/public/img/l.mini.png" alt=""></a>
    <div class="bookmark-group">
        <?php if (isset($_SESSION["id"])) : ?>
            <?php if ($reply["saved"]) : ?>
                <a href="<?= $reply["id"] ?>" id="remove-from-saved" class="do-link-bookmark svg-bold"><span class="lnr lnr-bookmark"></span></a>
                <a href="<?= $reply["id"] ?>" id="add-to-saved" style="display: none;" class="do-link-bookmark"><span class="lnr lnr-bookmark"></span></a>
            <?php else : ?>
                <a href="<?= $reply["id"] ?>" id="add-to-saved" class="do-link-bookmark"><span class="lnr lnr-bookmark"></span></a>
                <a href="<?= $reply["id"] ?>" id="remove-from-saved" style="display: none;" class="do-link-bookmark svg-bold"><span class="lnr lnr-bookmark"></span></a>
            <?php endif; ?>
        <?php else: ?>
            <a href="/login" class="do-link-bookmark"><span class="lnr lnr-bookmark"></span></a>
        <?php endif; ?>
    </div>
</div>

<script>
    $(".header").removeClass("header").addClass("header-default");
</script>
<script>
    $(".header-default").append($(".header-control-elements"))
</script>

<div class="product-info">

    <div class="main-product-img">
        <img src="/public/img/<?= $reply["img"] ?>" alt="">
    </div>

    <div class="product-info-title">
        <h3><?= $reply["appellation"] ?></h3>
    </div>
    <div class="product-info-price">
        <p>$<?= $reply["price"] ?></p>
    </div>
</div>

<div class="product-order-menu">
    <?php if (isset($_SESSION["id"])) : ?>
        <?php if ($incart) : ?>
            <button class="btn-add-to-cart btn-none-active" disabled><span
                        class="lnr lnr-checkmark-circle span-none-active"></span></button>
        <?php else : ?>
            <button class="btn-add-to-cart" data-id="<?= $reply["id"] ?>" id="add-to-cart">Добавить в корзину</button>
        <?php endif; ?>
    <?php else: ?>
        <button class="btn-add-to-cart" id="link-to-login">Добавить в корзину</button>
    <?php endif; ?>
</div>

<div class="description-of-product">
    <div class="description-of-product-text">
        <p><?= $reply["description"] ?></p>
    </div>
</div>

<script>
    $("#link-to-login").click(function () {
        window.location.href = "/login";
    });
</script>
<script>
    $("#add-to-saved").on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr("href");
        $.ajax({
            type: "POST",
            url: "/me/saved",
            data: {
                "add": {
                    "id": id
                }
            },
            success: function (reply) {
                $("#add-to-saved").css("display", "none");
                $("#remove-from-saved").css("display", "block");
            }
        });
    });
    $("#remove-from-saved").on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr("href");
        $.ajax({
            type: "POST",
            url: "/me/saved",
            data: {
                "remove": {
                    "id": id
                }
            },
            success: function (reply) {
                $("#remove-from-saved").css("display", "none");
                $("#add-to-saved").css("display", "block");
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#add-to-cart").on("click", function () {
            var id = $(this).attr("data-id");
            $.post("http://" + DEFAULT_LINK + "/cart/add/" + id, {}, function (reply) {
                $("#add-to-cart").html('<span class="lnr lnr-checkmark-circle span-none-active"></span>');
                $('#add-to-cart').prop('disabled', true);
                $('#add-to-cart').addClass("btn-none-active");
            });
            return false;
        });
    });
</script>

