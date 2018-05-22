<div class="product-cart">
    <!--
    <header class="product-cart-title">
        <h3>CART</h3>
    </header>
    -->
    <div class="product-cart-list">
        <?php foreach (\vendor\libs\Session::get("products") as $product) : ?>
            <!-- Отдельный класс товара -->
            <div class="product cart-product">
                <a href="#" data-id="<?= $product["id"] ?>" class="do-link-remove-fro-cart"><span
                            class="lnr lnr-cross-circle"></span></a>
                <div class="product-cart-img">
                    <img src="/public/img/<?= $product["img"] ?>" alt="">
                </div>
                <h4 class="product-title"><?= $product["appellation"] ?></h4>
                <p class="product-price"><?= $product["price"] ?></p>

                <div class="product-control-buttons">
                    <a href="#" data-id="<?= $product["id"] ?>" class="do-link-plus"><span
                                class="lnr lnr-plus-circle"></span></a>
                    <input type="text" id="input-count-<?= $product["id"] ?>" value="<?= $product["quality"] ?>"
                           class="input-count"/>
                    <a href="#" data-id="<?= $product["id"] ?>" class="do-link-minus"><span
                                class="lnr lnr-circle-minus"></span></a>
                </div>
            </div>
            <!-- /Отдельный класс товара -->
        <?php endforeach; ?>

    </div>
</div>

<div class="fixed-checkout">
    <div class="fixed-checkout-elements">
        <div class="count-total">
            <span>В ОБЩЕМ</span><span class="count-total-number"><b>$<?php echo \app\models\Cart::total() ?></b></span>
        </div>
        <button class="btn-checkout">ПРОДОЛЖИТЬ</button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".btn-checkout").click(function () {
            window.location.href = "/order";
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".do-link-remove-fro-cart").on("click", function (event) {
            event.preventDefault();
            var id = $(this).attr("data-id");
            $.post("http://" + DEFAULT_LINK + "/cart/remove/" + id, {}, function (reply) {
                location.reload();
                console.log(reply);
                $("#product-" + id).remove();
//                $("#count-products").html(reply);
            });
            return false;
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".do-link-plus").on("click", function (event) {
            event.preventDefault();
            var id = $(this).attr("data-id");
            $.ajax({
                type: "POST",
                data: {
                    "plus": id
                },
                success: function (reply) {
                    console.log(reply);
                    var json = JSON.parse(reply);
                    $("#input-count-" + id).val(json.quality);
                    $(".count-total-number").html("<b>$" + json.total + "</b>");
                }
            });
            return false;
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".do-link-minus").on("click", function (event) {
            event.preventDefault();
            var id = $(this).attr("data-id");
            $.ajax({
                type: "POST",
                data: {
                    "minus": id
                },
                success: function (reply) {
                    console.log(reply);
                    var json = JSON.parse(reply);
                    $("#input-count-" + id).val(json.quality);
                    $(".count-total-number").html("<b>$" + json.total + "</b>");
                }
            });
            return false;
        });
    });
</script>