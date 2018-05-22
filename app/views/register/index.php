<div class="register">
    <div class="register-form">
        <input type="text" class="input-name" name="name" placeholder="name" value="name">
        <input type="text" class="input-login" name="login" placeholder="login" value="login">
        <input type="text" class="input-number" name="number" placeholder="number" value="123456789100">
        <input type="email" class="input-email" name="email" placeholder="email" value="example@gmail.com">
        <input type="password" class="input-password" name="password" placeholder="password" value="password">
        <button class="btn-register">ЗАРЕГИСТРИРОВАТЬСЯ</button>
    </div>
</div>

<script>
    $(".btn-register").on("click", function () {
        var login = $(".input-login").val();
        var number = $(".input-number").val();
        var password = $(".input-password").val();
        var name = $(".input-name").val();
        var email = $(".input-email").val();
        $.ajax({
            type: "POST",
            data: {
                "login": login,
                "number": number,
                "password": password,
                "name": name,
                "email": email
            },
            success: function (reply) {

                var json = JSON.parse(reply);
                console.log(json);
                if  (json.correct) {
                    window.location.href = "/me";
                }
                if (!json.login) {
                    $(".input-login").css("border","solid 1px #f44336");
                }

            }
        });
        return false;
    });
</script>