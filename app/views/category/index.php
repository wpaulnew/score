<div class="product-roll">
    <header class="product-roll-title">
        <h3>T SHIRTS</h3>
    </header>
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
</div>

<script>

    $("#set-off").on("click", function (event) {
        event.preventDefault();
        var selected = $(".form").serialize();
        var answer = selected.split("&");
        var links = [];
        $.each(answer, function (i) {
//            console.log(answer);
            var difference = answer[i].split("=");
            links.push(difference.splice(1));
        });
        var link = "/" + links.join("/");
        alert(link);
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
