<div class="box-modal individual" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>
    <h1 class="individual__title">Индивидуальный заказ</h1>
    <form class="individual-order">
        <div class="form-group">
            <input type="text" class="individual-order__inp" id="surname" name="surname" placeholder="Фамилия">
        </div>

        <div class="form-group">
            <input type="text" class="individual-order__inp" id="name" name="name" placeholder="Имя">
        </div>

        <div class="form-group">
            <input type="tel" class="individual-order__inp" id="phone" name="phone" placeholder="Телефон">
        </div>

        <div class="form-group">
            <textarea class="individual-order__inp" name="note" id="note" cols="40" rows="30" placeholder="Описание"></textarea>
        </div>

        <div class="form-group">
            <button class="individual-order__btn">Отправить</button>
        </div>

    </form>

</div>

<script src="{{ asset('libs/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script>
    $(document).find('input[type="tel"]').mask("+7 (999) 999-99-99");
    $(document).find('.individual-order').validate({
        rules: {
            surname: {
                required : true,
                maxlength: 20,
                minlength : 5,
            },
            name: {
                required : true,
                maxlength: 20,
                minlength : 2,
            },
            phone: {
                required: true,
            },
            note: {
                required : true,
            },
        },
        submitHandler: function(){
            $.ajax({
                url: "/individualOrder",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    surname : $("input[name=surname]").val(),
                    name : $("input[name=name]").val(),
                    phone : $("input[name=phone]").val(),
                    note : $("textarea[name=note]").val()
                },
                beforeSend: function() {
                    $(document).find('.individual-order').remove();
                    $('.individual__title').css('padding', "50px 15px");
                    $('.individual__title').html('Индивидуальный заказ отправлен');
                },
                success: function (response) {

                },
                error: function (message){
                    console.log(message)
                }
            });
        }
    });

</script>
