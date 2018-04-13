<h1 style="margin-top: 78px">

    <div class="me-p-box">
        <div class="me-p-name">
            <p><?php echo $_SESSION["name"]; ?></p>
        </div>
        <div class="me-p-orders">
            <div class="product">
                <div class="product-img">
                    <img src="/public/img/product.png" alt="">
                </div>
                <h4 class="order-title">Road to the Dream V-Shape</h4>
                <p class="product-price">$24.40</p>
                <p class="order-state">Обрабатываеться</p>
            </div>
            <div class="product">
                <div class="product-img">
                    <img src="/public/img/product.png" alt="">
                </div>
                <h4 class="order-title">Road to the Dream V-Shape</h4>
                <p class="product-price">$24.40</p>
                <p class="order-state">Отправлен</p>
            </div>
        </div>
    </div>
<!--
    Отображаем в низу заказы
    заказы будут по фильтру, последние в верху.
    У заказов будет состояние ( обрабатываеться, отправлен )
    Изменения состояния я зименяю из админки, когда
    работаю с товором
 -->
    <?php
    echo "<pre>";
    print_r($_SESSION);
    ?>
</h1>