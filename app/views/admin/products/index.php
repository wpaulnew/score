<!-- {a}-number -->
<div class="box-container">
    <div class="box">
        <div class="product-info">
            <div class="product-info-list">
                <p class="admin-product-title a-title-1">Road to the Dream V-Shape Logo</p>
                <input type="text" value="Road to the Dream V-Shape Logo" id="a-title-1" class="admin-input-title">

                <p class="admin-product-price a-price-1">24.40</p>
                <input type="text" value="24.40" id="a-price-1" class="admin-input-price">
            </div>
            <div key={order.id} class="client-orders">
                <div class="admin-product-box">
                    <img
                        src='http://192.168.0.89/public/img/opened.png'
                        class="admin-product-img"
                        id="product-img-1"
                        alt='title'
                    />
                    <input type="file" id="input-file-1" class="admin-input-file">
                    <textarea id="input-textarea-1" class="admin-textarea-description">In honor of the opening of the first hall The road to the dream, a gold collection of joggers with a gold logo and T-shirts with print Legends never die. Ideal for both training and everyday style!</textarea>
                </div>
            </div>
            <div class="box-control-btns">
                <button id='btn-edit-1' data-id="1" class="btn-edit">Редактировать</button>
                <button id='btn-save-1' data-id="1" class="btn-save">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(".btn-edit").on("click", function () {
        let id = $(this).attr("data-id");
        $("#btn-edit-" + id).css("display","none");
        $("#btn-save-" + id).css("display","block");

        $(".a-title-" + id).css("display","none");
        $("#a-title-" + id).css("display","block");
        $(".a-price-" + id).css("display","none");
        $("#a-price-" + id).css("display","block");

        $("#product-img-" + id).css("display","none");
        $("#input-file-" + id).css("display","flex");

        $("#input-textarea-" + id).css("display","block");
    });
    $(".btn-save").on("click", function () {
        let id = $(this).attr("data-id");
        $("#btn-save-" + id).css("display","none");
        $("#btn-edit-" + id).css("display","block");

        $(".a-title-" + id).css("display","block");
        $("#a-title-" + id).css("display","none");
        $(".a-price-" + id).css("display","block");
        $("#a-price-" + id).css("display","none");

        $("#product-img-" + id).css("display","block");
        $("#input-file-" + id).css("display","none");

        $("#input-textarea-" + id).css("display","none");

        let title = $("#a-title-" + id).val();
        let price = $("#a-price-" + id).val();

//        let file_data = $("#input-file-" + id).prop('files')[0];
//        let form_data = new FormData();
//        form_data.append('file', file_data);
//        console.log(form_data);

        let file = $("#input-file-" + id).val();
        console.log(file);

        let description = $("#input-textarea-" + id).val();

        $.ajax({
            type: "POST",
            cache : false,
            url : "/admin/products/edit",
            processData : false,
            contentType : false,
            data: {
                "title" : title,
                "price" : price,
                "file" : file,
                "description" : description
            },
            success: function(reply){
                console.log(reply);
            }
        });
        return false;

        console.log(description);
    });
</script>