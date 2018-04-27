<div class="container admin-login-form">
    <div class="col-md-6">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="login" class="form-control" id="email" aria-describedby="loginHelp" placeholder="Enter login">
                <small id="loginHelp" class="form-text text-muted">We'll never share your login with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
        </form>
        <button type="submit" id="btn-login" class="btn btn-primary">Submit</button>
    </div>
</div>

<script>
    $("#btn-login").on("click", function () {
        var login = $("#email").val();
        var password = $("#password").val();
        $.ajax({
            type: "POST",
            data: {
                "login" : login,
                "password" : password
            },
            success: function(reply){
                console.log(reply);
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