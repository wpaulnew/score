<div class="product-roll">
<!--    <header class="product-roll-title">-->
<!--        <h3>T SHIRTS</h3>-->
<!--    </header>-->
    <div class="product-roll-list">
        <?php foreach ($products as $product) : ?>
            <!-- Отдельный класс товара -->
            <div class="product product-roll-product">
                <div class="product-img">
                    <img src="/public/img/<?php echo $product["img"]; ?>" alt="">
                </div>
                <a href="/product/<?php echo $product["id"]; ?>" class="product-title">
                    <h4><?php echo $product["appellation"]; ?></h4></a>
                <p class="product-price"><?php echo $product["price"]; ?></p>

                <!--            <a href="#" data-id="1" class="do-link-remove-from-saved"><span class="lnr lnr-cross-circle"></span></a>-->
            </div>
            <!-- /Отдельный класс товара -->
        <?php endforeach; ?>

    </div>
</div>

<script>

    $("#set-off").on("click", function (event) {
        event.preventDefault();
        var selected = $(".form").serialize();
        var answer = selected.split("&");
        var links = [];
        $.each(answer, function (i) {
            var difference = answer[i].split("=");
            links.push(difference.splice(1));
        });
        var link = "/" + links.join("/");
        window.location.href = link;
    });

</script>
<script>
    $("#open-alpha").on("click", function () {
        $(".content").css("opacity", "0");
        $(".content").css("z-index", "-1");
        $("#c-menu").css("display", "none");
        $("#a-menu").css("display", "flex");
        $("html").css("overflow-y", "hidden");
        $(".alpha-menu").css("display", "flex");

        $.ajax({
            type: "POST",
            data: {
                "section": true
            },
            success: function (reply) {
                var json = JSON.parse(reply);
                $("#section-a").html('<h4 class="plan-titles">Gender</h4>' + json.genders);
                $("#section-b").html('<h4 class="plan-titles">Category of goods</h4>' + json.categories);
            }
        });

    });

    $("#close-alpha").on("click", function () {
        $(".content").css("opacity", "1");
        $(".content").css("z-index", "1");
        $("#c-menu").css("display", "flex");
        $("#a-menu").css("display", "none");
        $("html").css("overflow-y", "scroll");
        $(".alpha-menu").css("display", "none");
    });
</script>
