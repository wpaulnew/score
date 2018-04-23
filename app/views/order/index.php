<?php
//echo "<pre>";
//print_r($_SESSION);
?>

<div class="regulations">
    <div class="regulations-text">
        <p>1. При нажатии кнопки "Я понимаю, продолжить", вы соглашаетесь с условиями..</p>
        <p>2. После соглашения вам позвонит нащ консультант</p>
        <p>3. Если вам не позвонили напишите нам в подержку</p>
    </div>
</div>

<div class="fixed-checkout">
    <div class="fixed-checkout-elements">
        <button id="btn-understand" class="btn-order-understand">Я понимаю, продолжить</button>
    </div>
</div>

<script>
    $("#btn-understand").on("click", function () {
        $.ajax({
            type: "POST",
            data: {
                "understand": true
            },
            success: function (reply) {
                console.log(reply);
                var json = JSON.parse(reply);
                if (json.correct) {
                    window.location.href = "/me";
                }
            }
        });
        return false;
    });
</script>