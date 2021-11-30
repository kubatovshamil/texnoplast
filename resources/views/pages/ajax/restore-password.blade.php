<div class="box-modal individual register-form-content" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>

    <form action="{{ route('forget.password.post') }}" method="post" id="restore" class="individual-order">
        @csrf
        @method('post')
        <h1 class="individual__title">Восстановление</h1>

        <div class="form-group">
            <input type="email" class="individual-order__inp" id="email" name="email" placeholder="E-mail">
        </div>
        <div class="form-group to-top">
            <a class="to-back" href="#">Назад</a>
            <button class="individual-order__restore_btn">Восстановить</button>
        </div>
    </form>
</div>

<script>

    $(document).find('#restore').validate({
        rules: {
            email: {
                required : true,
                email : true,
            },
        },
        messages: {
            email: {
                required: "Email обязателен для ввода",
                email: "Вы должны ввести актуальный email",
            },
        },
        submitHandler: function (){
            $.ajax({
                url: "/forget-password",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email : $("input[name=email]").val(),
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        location.reload();
                    } else {
                        elem = "<label id='email-error' class='error' for='email'>" + data.error.email + "</label>";
                        $("#email").after(elem);
                    }
                },
                error: function (message){
                    console.log(message)
                }
            });
        }
    });
</script>
