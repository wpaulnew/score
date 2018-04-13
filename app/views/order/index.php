<div style="margin-top: 70px">


    <?php
    echo "<pre>";
    print_r($_SESSION);
    ?>

    <button id="btn-understand">Understand</button>
</div>

<script>
    $("#btn-understand").on("click", function () {
        $.ajax({
            type: "POST",
            data: {
                "understand" : true
            },
            success: function (reply) {
                console.log(reply);
                var json = JSON.parse(reply);
                if  (json.correct) {
                    window.location.href = "/me";
                }
            }
        });
        return false;
    });
</script>