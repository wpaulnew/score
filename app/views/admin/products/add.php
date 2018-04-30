<div class="container-form-for-add-product">
    <div class="form-add">
        <div class="form-add-inputs">
            <input type="text" id="appellation" placeholder="Название">
            <input type="file" id="img">
            <textarea id="description" placeholder="Описание"></textarea>
            <select name="select" id="gender">
                <option selected="selected">Пол</option>
                <option>men</option>
                <option>women</option>
            </select>
            <select name="select" id="category">
                <option selected="selected">Категория</option>
                <option>all</option>
                <option>all</option>
                <option>all</option>
            </select>
            <input type="number" id="price" placeholder="Цена">
            <button id="add-product">Добавить товар</button>
        </div>
    </div>
</div>
<script>
    $("#add-product").on("click", function () {
        let appellation = $("#appellation").val();
        let img = $("#img");
        let description = $("#description").val();
        let category = $("#category").val();
        let gender = $("#gender").val();
        let price = $("#price").val();

        let fd = new FormData;

        fd.append('img', img.prop('files')[0]);

        if (img.prop('files')[0] !== undefined) {
            $.ajax({
                url: '/admin/products/add',
                data: fd,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (img) {
                    $.ajax({
                        type: 'POST',
                        url: '/admin/products/add',
                        data: {
                            'appellation': appellation,
                            'img': img,
                            'description': description,
                            'category': category,
                            'gender': gender,
                            'price': price,
                        },
                        success: function (reply) {
                            console.log(reply);
                            let json = JSON.parse(reply);
                            if (json.correct) {
                                $("#add-product").text("Товар добавлен");
                                let appellation = $("#appellation").val("");
                                let img = $("#img").val("");
                                let description = $("#description").val("");
                                let category = $("#category").val("");
                                let gender = $("#gender").val("");
                                let price = $("#price").val("");
                            }
                        }
                    });
                }
            });
            return false;
        }

//        $.ajax({
//            type: "POST",
//            data: {
//                "login" : login,
//                "password" : password
//            },
//            success: function(reply){
//                console.log(reply);
//                let json = JSON.parse(reply);
//                if  (json.current) {
//                    window.location.href = "/admin/products";
//                }
//            }
//        });
//        return false;
    });
</script>