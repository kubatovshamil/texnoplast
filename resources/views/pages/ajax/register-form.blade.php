<div class="box-modal individual register-form-content" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>
    <form action="{{ route('to.login') }}" method="post" class="individual-order">
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
            <button class="individual-order__btn">Войти</button>
            <a class="to-register-form" href="/register">Зарегистрироваться</a>
            <a class="forgot-pw" href="#">Забыли пароль</a>
        </div>

    </form>
</div>
<script>
    $(document).find('.individual-order').validate({
        rules: {
            email: {
                required : true,
                email : true,
            },
            password: {
                required : true,
            },
        },
        messages: {
            email: {
                required: "Email обязателен для ввода",
                email: "Вы должны ввести актуальный email",
            },
            password: {
                required: "Пароль обязателен для ввода",
            },
        }
    });
</script>
