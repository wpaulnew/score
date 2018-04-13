<div class="header-control-elements another-menu">
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="do-link-back"><span class="lnr lnr-arrow-left"></span></a>
    <a href="/"><img src="/public/img/l.mini.png" alt=""></a>
    <!-- Если такой товар есть в закладках то собзить об этом -->
    <div class="bookmark-group">
        <?php if ($reply["saved"]) : ?>
            <a href="<?= $reply["id"] ?>" id="remove-from-saved" class="do-link-bookmark svg-bold"><span
                        class="lnr lnr-bookmark"></span></a>
        <?php else : ?>
            <a href="<?= $reply["id"] ?>" id="add-to-saved" class="do-link-bookmark"><span
                        class="lnr lnr-bookmark"></span></a>
        <?php endif; ?>
    </div>
    <!-- Создать подобуую ссылку, с id remove-from-saved -->
</div>

<script>
    $(".header").html($(".header-control-elements"))
</script>

<div class="product-info">

    <div class="main-product-img">
        <img src="/public/img/<?= $reply["img"] ?>" alt="">
    </div>

    <div class="product-info-title">
        <h3><?= $reply["appellation"] ?></h3>
    </div>
    <div class="product-info-price">
        <p><?= $reply["price"] ?></p>
    </div>
</div>

<div class="product-order-menu">
    <button class="btn-add-to-cart" data-id="<?= $reply["id"] ?>" id="add-to-cart">ADD TO CART</button>
</div>

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
                $(".do-link-bookmark").attr("id", "remove-from-saved").addClass(" svg-bold");
//                $(".do-link-bookmark").addClass(" svg-bold");

//                $(".bookmark-group").html('<a href="' + id + '" id="remove-from-saved" class="do-link-bookmark svg-bold"><span\n' +
//                    '                        class="lnr lnr-bookmark"></span></a>');
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
                $(".do-link-bookmark").attr("id", "add-to-saved").removeClass(" svg-bold");
//                $(".do-link-bookmark").removeClass(" svg-bold");
//                $(".bookmark-group").html('<a href="' + id + '" id="add-to-saved" class="do-link-bookmark"><span class="lnr lnr-bookmark"></span></a>');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#add-to-cart").on("click", function () {
            var id = $(this).attr("data-id");
            $.post("http://localhost/cart/add/" + id, {}, function (reply) {
                console.log(reply);
                $("#add-to-cart").html('<span class="lnr lnr-checkmark-circle"></span>');
//                $("#count-products").html(reply);
            });
            return false;
        });
    });
</script>