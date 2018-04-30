<!-- {a}-number -->
<div class="box-container">
    <?php foreach ($products as $product) : ?>
        <div class="box">
            <div class="product-info">
                <div class="product-info-list">
                    <p class="admin-product-title a-title-<?= $product["id"] ?>"><?= $product["appellation"] ?></p>
                    <input type="text" value="<?= $product["appellation"] ?>" id="a-title-<?= $product["id"] ?>"
                           class="admin-input-title">

                    <p class="admin-product-price a-price-<?= $product["id"] ?>"><?= $product["price"] ?></p>
                    <input type="text" value="<?= $product["price"] ?>" id="a-price-<?= $product["id"] ?>"
                           class="admin-input-price">
                </div>
                <div class="client-orders">
                    <div class="admin-product-box">
                        <img
                                src='http://192.168.0.89/public/img/<?= $product["img"] ?>'
                                class="admin-product-img"
                                id="product-img-<?= $product["id"] ?>"
                                alt='<?= $product["appellation"] ?>'
                        />
                        <input type="file" id="input-file-<?= $product["id"] ?>" class="admin-input-file">
                        <textarea id="input-textarea-<?= $product["id"] ?>"
                                  class="admin-textarea-description"><?= $product["description"] ?></textarea>
                    </div>
                </div>
                <div class="box-control-btns">
                    <button id='btn-edit-<?= $product["id"] ?>' data-id="<?= $product["id"] ?>" class="btn-edit">
                        Редактировать
                    </button>
                    <button id='btn-close-<?= $product["id"] ?>' data-id="<?= $product["id"] ?>" class="btn-close">
                        Закрыть
                    </button>
                    <button id='btn-save-<?= $product["id"] ?>' data-id="<?= $product["id"] ?>" class="btn-save">
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="box">
        <div class="product-info">
            <div class="product-info-list">
                <p class="admin-product-title a-title-2">Road to the Dream V-Shape Logo</p>
                <input type="text" value="Road to the Dream V-Shape Logo" id="a-title-2" class="admin-input-title">

                <p class="admin-product-price a-price-2">24.40</p>
                <input type="text" value="24.40" id="a-price-2" class="admin-input-price">
            </div>
            <div class="client-orders">
                <div class="admin-product-box">
                    <img
                            src='http://192.168.0.89/public/img/opened.png'
                            class="admin-product-img"
                            id="product-img-2"
                            alt='title'
                    />
                    <input type="file" id="input-file-2" class="admin-input-file">
                    <textarea id="input-textarea-2" class="admin-textarea-description">In honor of the opening of the first hall The road to the dream, a gold collection of joggers with a gold logo and T-shirts with print Legends never die. Ideal for both training and everyday style!</textarea>
                </div>
            </div>
            <div class="box-control-btns">
                <button id='btn-edit-2' data-id="2" class="btn-edit">Редактировать</button>
                <button id='btn-close-2' data-id="2" class="btn-close">Закрыть</button>
                <button id='btn-save-2' data-id="2" class="btn-save">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<script>
    function edit(id) {
        $("#btn-edit-" + id).css("display", "none");
        $("#btn-save-" + id).css("display", "block");
        $("#btn-close-" + id).css("display", "block");

        $(".a-title-" + id).css("display", "none");
        $("#a-title-" + id).css("display", "block");
        $(".a-price-" + id).css("display", "none");
        $("#a-price-" + id).css("display", "block");

        $("#product-img-" + id).css("display", "none");
        $("#input-file-" + id).css("display", "flex");

        $("#input-textarea-" + id).css("display", "block");
    }

    function close(id) {
        $("#btn-save-" + id).css("display", "none");
        $("#btn-edit-" + id).css("display", "block");
        $("#btn-close-" + id).css("display", "none");

        $(".a-title-" + id).css("display", "block");
        $("#a-title-" + id).css("display", "none");
        $(".a-price-" + id).css("display", "block");
        $("#a-price-" + id).css("display", "none");

        $("#product-img-" + id).css("display", "block");
        $("#input-file-" + id).css("display", "none");

        $("#input-textarea-" + id).css("display", "none");
    }

    function save(id) {
    }

    $(".btn-edit").on("click", function () {
        let id = $(this).attr("data-id");
        edit(id);
    });

    $(".btn-close").on("click", function () {
        let id = $(this).attr("data-id");
        close(id);
    });


    $(".btn-save").on("click", function () {
        let id = $(this).attr("data-id");
        let appellation = $("#a-title-" + id).val();
        let price = $("#a-price-" + id).val();
        let description = $("#input-textarea-" + id).val();

        let input = $("#input-file-" + id);
        let fd = new FormData;

        fd.append('img', input.prop('files')[0]);

        if (input.prop('files')[0] !== undefined) {
            $.ajax({
                url: '/admin/products/edit',
                data: fd,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (images) {
                    console.log("images", images);
                    $.ajax({
                        type: 'POST',
                        url: '/admin/products/edit',
                        data: {
                            'id': id,
                            'appellation': appellation,
                            'img': images,
                            'price': price,
                            'description': description
                        },
                        success: function (reply) {
                            console.log("IMG", reply);
                        }
                    });
                }
            });
            return false;
        }

        if (input.prop('files')[0] === undefined) {
            $.ajax({
                type: 'POST',
                url: '/admin/products/edit',
                data: {
                    'id': id,
                    'appellation': appellation,
                    'img': false,
                    'price': price,
                    'description': description
                },
                success: function (reply) {
                    console.log("NO IMG", reply);
                }
            });
        }
    });
</script>