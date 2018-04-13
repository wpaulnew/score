<div class="register">
    <div class="register-form">
        <input type="text" class="input-name" name="name" placeholder="name" value="name">
        <input type="text" class="input-login" name="login" placeholder="login" value="login">
        <input type="email" class="input-email" name="email" placeholder="email" value="example@gmail.com">
        <input type="password" class="input-password" name="password" placeholder="password" value="password">
        <button class="btn-register">REGISTER</button>
    </div>
</div>

<script>
    $(".btn-register").on("click", function () {
        var login = $(".input-login").val();
        var password = $(".input-password").val();
        var name = $(".input-name").val();
        var email = $(".input-email").val();
        $.ajax({
            type: "POST",
            data: {
                "login": login,
                "password": password,
                "name": name,
                "email": email
            },
            success: function (reply) {
                console.log(reply);
                var json = JSON.parse(reply);
                if (!json.login) {
                    $(".input-login").css("border","solid 1px #f44336");
                }
                if  (json.correct) {
                    window.location.href = "/me";
                }
            }
        });
        return false;
    });
</script>