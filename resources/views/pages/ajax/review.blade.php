<div class="box-modal individual" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>

    <h1 class="individual__title">Отзыв</h1>

    <form class="individual-order">

        <div class="form-group">
            <input type="text" class="individual-order__inp" id="name" name="name" placeholder="Имя">
        </div>

        <div class="form-group">
            <label for="rewiew">Оценка: </label> <br>
            <div class="product_card__reviews-stars">
                <div class="product_card__star"></div>
                <div class="product_card__star"></div>
                <div class="product_card__star"></div>
                <div class="product_card__star"></div>
                <div class="product_card__star"></div>
            </div>
        </div>


        <div class="form-group">
            <textarea class="individual-order__inp" name="message" id="message" cols="40" rows="30" placeholder="Напишите отзыв"></textarea>
        </div>

        <div class="form-group">
            <button class="individual-order__btn">Отправить</button>
        </div>


    </form>
</div>

<script>
    $(".form-group .product_card__star").on('click', function (){
        $(".form-group .product_card__reviews-stars .product_card__star-fill").each(function(i, item){
            $(item).removeClass("product_card__star-fill");
        });
        $(this).toggleClass("product_card__star-fill");
        $(this).prevAll().toggleClass("product_card__star-fill");
    });

    $(document).find('.individual-order').validate({
        rules: {
            name: {
                required : true,
            },
            message: {
                required : true,
            },
        },
        submitHandler : function(){
            $.ajax({
                url: "/review",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    name : $("input[name=name]").val(),
                    rating : $(".form-group .product_card__reviews-stars .product_card__star-fill").length,
                    message : $("textarea[name=message]").val(),
                    url : window.location.pathname.split("/").pop()
                },
                beforeSend: function() {
                    $(document).find('.individual-order').remove();
                    $('.individual__title').css('padding', "50px 15px");
                    $('.individual__title').html('Ваша Отзыв был отправлен...');
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (message){
                    console.log(message)
                }
            });
        }
    });
</script>
