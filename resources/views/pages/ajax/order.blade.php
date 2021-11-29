
<style>
    label.error {
        color: #dc3545;
        font-size: 14px;
    }
</style>

<div class="box-modal individual" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>
    <h1 class="individual__title">Индивидуальный заказ</h1>
    <form action="{{ route('individual.order') }}" class="individual-order" method="post">
        @csrf
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

        <button class="individual-order__btn">Отправить</button>

    </form>

</div>

<script src="{{ asset('libs/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script>
    $(document).find('input[type="tel"]').mask("+7 (999) 999-99-99");

    $(document).find('.individual-order').validate({
        rules: {
            surname: "required",
            name: "required",
            phone: "required",
            note: "required",
        },
        messages: {
            surname: "Фамилия обязателен",
            name: "Имя обязателен",
            phone: "Номер обязателен",
            note: "Описание обязателен",
        }
    });


</script>
