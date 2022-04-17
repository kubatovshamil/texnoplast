<div class="box-modal individual register-form-content" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>
    <form action="{{ route('to.login') }}" method="post" id="login" class="individual-order">
        @csrf
        @method('post')
        <h1 class="individual__title">Войти</h1>
        <div class="form-group">
            <input type="email" name="email" id="email" class="individual-order__inp" placeholder="Логин">
        </div>

        <div class="form-group">
            <input type="password" name="password" id="password" class="individual-order__inp" placeholder="Пароль">
        </div>
        <div class="form-group">
            <button class="login__btn">Войти</button>
            <a class="to-register-form" href="/register.php">Зарегистрироваться</a>
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
        submitHandler: function(){
            $.ajax({
                url: "/login",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email : $("#login").find("#email").val(),
                    password : $("#login").find("#password").val(),
                },
                beforeSend: function() {
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
