<div class="box-modal individual register-form-content" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>

    <form action="{{ route('forget.password.post') }}" method="post" class="individual-order">
        @csrf
        @method('post')
        <h1 class="individual__title">Восстановление</h1>

        <div class="form-group">
            <input type="email" class="individual-order__inp" name="email" placeholder="E-mail">
        </div>
        <div class="form-group to-top">
            <a class="to-back" href="#">Назад</a>
            <button class="individual-order__restore_btn">Восстановить</button>
        </div>
    </form>
</div>
