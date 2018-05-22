<div class="login">
    <div class="login-form">
        <div class="error-login">Ошибка входа</div>
        <input type="text" class="input-login" name="login" placeholder="login" value="login">
        <input type="1234" class="input-password" name="password" placeholder="password" value="password">
        <button class="btn-login">ВОЙТИ</button>
    </div>
</div>

<script>
    $(".btn-login").on("click", function () {
        var login = $(".input-login").val();
        var password = $(".input-password").val();
        $.ajax({
            type: "POST",
            data: {
                "login" : login,
                "password" : password
            },
            success: function(reply){
                console.log(reply);
                var json = JSON.parse(reply);
                if  (json.current) {
                    window.location.href = "/me";
                }
                if  (!json.current) {
                    $(".error-login").css("display","block");
                }
            }
        });
        return false;
    });
</script>