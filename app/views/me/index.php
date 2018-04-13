<h1 style="margin-top: 78px">
    <div class="saved-elements">
        <?php
//        echo "<pre>";
//        print_r($orders);
        ?>
        <?php foreach ($orders as $order) : ?>
            <div class="saved-elements-group" id="remove-4">
                <div class="elements-group-img">
                    <img src="/public/img/<?php echo $order["img"]; ?>" alt="">
                </div>
                <!-- i like information -->
                <div class="elements-group-i">
                    <a href="/product/<?php echo $order["id"]; ?>" class="elements-group-title order-title">
                        <h3><?php echo $order["appellation"]; ?></h3></a>
                </div>
                <div class="elements-group-control">
                    <h3><?php echo $order["processed"] == 0 ? "Обрабатываеться" : "Отравлен"; ?></h3>
                </div>
            </div>
        <?php endforeach; ?>
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