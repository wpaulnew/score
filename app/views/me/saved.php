<div class="saved">
    <div class="saved-elements">
        <?php foreach ($reply as $product): ?>
            <div class="saved-elements-group">
                <div class="elements-group-img">
                    <img src="/public/img/<?= $product["img"] ?>" alt="">
                </div>
                <!-- i like information -->
                <div class="elements-group-i">
                    <a href="/<?= $product["category"] ?>/<?= $product["denomination"] ?>/<?= $product["id"] ?>"
                       class="elements-group-title"><h3><?= $product["appellation"] ?></h3></a>
                    <span class="elements-group-price">$<?= $product["price"] ?></span>
                </div>
                <div class="elements-group-control">
                    <a href="<?= $product["id"] ?>" class="link-remove-from-saved"><span
                                class="lnr lnr-cross-circle"></span></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
//echo "<pre>";
//print_r($reply);
?>
<script>
    $(".link-remove-from-saved").on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr("href");
        $.ajax({
            type: "POST",
            url: "/me/saved",
            data: {
                "remove": {
                    "id": id
                }
            },
            success: function (reply) {
                console.log(reply);
            }
        });
    });
</script>
