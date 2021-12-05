<div class="box-modal individual" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>
    <h1 class="individual__title">от Поставщика</h1>
    <form action="" method="post" class="individual-order" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="individual-order__inp" id="surname" name="surname" placeholder="Фамилия">
        </div>

        <div class="form-group">
            <input type="text" class="individual-order__inp" id="name" name="name" placeholder="Имя">
        </div>

        <div class="form-group">
            <input type="tel" class="individual-order__inp" id="phone" name ="phone" placeholder="Телефон">
        </div>

        <div class="form-group">
            <textarea class="individual-order__inp" name="note" id="note" cols="40" rows="30" placeholder="Ваще предложение"></textarea>
        </div>

        <div class="form-group">
            <input type="file" name="file" id="file">
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
            file : {
                required : true
            }
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).find('.individual-order').on('submit', function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url : "/orderProvider",
            data : formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function()
            {

            },
            success: function(response){
                $(document).find('.individual-order').remove();
                $('.individual__title').css('padding', "50px 15px");
                $('.individual__title').html('Ваща завяка отправлена ждите пока с вами свяжутся...');
            },
            error: function(message){
                console.log(message);
            }
        })
    });
</script>
