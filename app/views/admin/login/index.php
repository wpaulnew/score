<div class="admin-login-form">
    <div class="inputs-group">
        <input type="text" class="admin-input-login" placeholder="login" id="login" value="login">
        <input type="password" class="admin-input-password" placeholder="password" id="password" value="password">
        <button id="btn-login">Войти</button>
    </div>
</div>

<script>
    $("#btn-login").on("click", function () {
        let login = $("#login").val();
        let password = $("#password").val();
        $.ajax({
            type: "POST",
            data: {
                "login" : login,
                "password" : password
            },
            success: function(reply){
                console.log(reply);
                let json = JSON.parse(reply);
                if  (json.current) {
                    window.location.href = "/admin/products";
                }
            }
        });
        return false;
    });
</script>