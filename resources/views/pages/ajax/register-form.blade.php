<div class="box-modal individual register-form-content" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>
    <form action="{{ route('to.login') }}" method="post" id="login" class="individual-order">
        @csrf
        @method('post')
        <h1 class="individual__title">Войти</h1>
        <div class="form-group">
            <input type="email" name="email" id="email log-id" class="individual-order__inp" placeholder="Логин">
        </div>

        <div class="form-group">
            <input type="password" name="password" id="password" class="individual-order__inp" placeholder="Пароль">
        </div>
        <div class="form-group">
            <button class="login__btn">Войти</button>
            <a class="to-register-form" href="/register">Зарегистрироваться</a>
            <a class="forgot-pw" href="javascript:void(1)">Забыли пароль</a>
        </div>

    </form>
</div>
<script>


    $(document).find('#login').validate({
        rules: {
            email: {
                required : true,
                email : true,
            },
            password: {
                required : true,
            },
        },
        submitHandler: function(event){
            $.ajax({
                url: "/login",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                beforeSend: function() {
                    $($(event))[0].find('input[name=email]');
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
