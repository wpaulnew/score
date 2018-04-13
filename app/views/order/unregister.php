<div class="order">
    <div class="order-form">
        <input type="text" class="input-name" name="name" placeholder="name" value="Paul">
        <input type="text" class="input-email" name="email" placeholder="email" value="email">
        <input type="number" class="input-number" name="number" placeholder="number" value="3809660547">
        <input type="text" class="input-address" name="address" placeholder="address" value="Набережная, 22">
        <button class="btn-order">ORDER</button>
        <div class="success"></div>
    </div>
</div>

<script>
    $(".btn-order").on("click", function () {
        var name = $(".input-name").val();
        var email = $(".input-email").val();
        var number = $(".input-number").val();
        var address = $(".input-address").val();
        $.ajax({
            type: "POST",
            data: {
                "unregister" : {
                    "name" : name,
                    "email" : email,
                    "number" : number,
                    "address" : address
                }
            },
            success: function(reply){
                console.log(reply);
                $(".success").html(reply);
                $(".order-form input").css("display","none");
                $(".btn-order").css("display","none");
//                var json = JSON.parse(reply);
//                if  (json.current) {
//                    window.location.href = "/me";
//                }
//                if  (!json.current) {
//                    $(".error-login").css("display","block");
//                }
            }
        });
        return false;
    });
</script>