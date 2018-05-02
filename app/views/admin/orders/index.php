<?php //echo "<pre>";print_r($booking); ?>
<div class="box-container">
    <?php foreach ($booking as $book) : ?>
    <div class="d-box">
        <div class="client-info">
            <div class="client-info-list">
                <p class="client-info-name"><?=$book["client"]["name"]?></p>
                <p class="client-info-number"><?=$book["client"]["number"]?></p>
                <p class="client-info-email"><?=$book["client"]["email"]?></p>
            </div>
            <div class="d-client-orders">
                <?php foreach ($book["orders"] as $order) : ?>
                    <div class="d-client-order">
                        <img
                                src='http://192.168.0.89/public/img/<?=$order["product"]["img"]?>'
                                class="client-order-img"
                                alt='<?=$order["product"]["appellation"]?>'/>
                        <p class="client-order-title"><?=$order["product"]["appellation"]?></p>
                        <p class="client-order-quantity"> <?=$order["quantity"]?></p>
                    </div>
            <?php endforeach; ?>
            </div>
            <div class="d-order-control-btns">
                <button id='<?=$order["code"]?>' class="btn-move">Подтвердить</button>
                <span><?=$order["code"]?></span>
                <button id='<?=$order["code"]?>' class="btn-remove">Удалить</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script>
    $(".btn-move").on("click", function () {
        $.ajax({
            type: "POST",
            data: {
                "move" : $(this).attr("id"),
            },
            success: function(reply){
                let json = JSON.parse(reply);
                if  (json.correct) {
                    location.reload();
                }
            }
        });
    });
    $(".btn-remove").on("click", function () {
        $.ajax({
            type: "POST",
            data: {
                "remove" : $(this).attr("id"),
            },
            success: function(reply){
                let json = JSON.parse(reply);
                if  (json.correct) {
                    location.reload();
                }
            }
        });
    });
</script>