<div class="box-modal individual" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>
    <h1 class="individual__title">Заказать звонок</h1>
    <form action="#" class="individual-order">
        <div class="form-group">
            <input type="text" class="individual-order__inp" name="surname" placeholder="ФИО">
        </div>

        <div class="form-group">
            <input type="tel" id="#phone" data-name="phone" name="phone" class="individual-order__inp" placeholder="Телефон">
        </div>

        <button id="send" class="individual-order__btn">Отправить</button>

    </form>

</div>

<script src="{{ asset('libs/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script>
    $(document).find('input[type="tel"]').mask("+7 (999) 999-99-99");
</script>
