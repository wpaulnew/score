<div class="wrapper">
    <div class="bar">
        <ul class="bar-list">
            <li>Hoodies</li>
            <li>T-shirts</li>
            <li>Longsleeves</li>
        </ul>
    </div>
    <div class="content">
        <?php foreach ($products as $product) : ?>
            <div class="product" id="<?= $product["id"] ?>">
                <img src="/public/img/upload/<?= $product["img"] ?>" class="img">
                <h3 class="title"><?= $product["appellation"] ?></h3>
                <span class="price"><?= $product["price"] ?></span>
                <button id="<?= $product["id"] ?>" class="add-to-corf">ADD</button>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="corf">

    </div>
</div>

<script>
    $(".add-to-corf").on("click", function () {
        var id = $(this).attr("id");
        var title = $("#" + id + ">.title").text();
//        console.log(title);
//        $("#"+id).css("display", "none");
        var add = '<div class="added-product"><h3>' + title + '</h3><button id="' + id + '" class="remove-from-corf">Remove</button></div>';
        $(".corf").append(add);
    });

    $(".added-product").on("click", "remove-from-corf", function () {
        var id = $(this).attr("id");
        console.log(id);
        $(".remove-" + id).detach();
    });
</script>
