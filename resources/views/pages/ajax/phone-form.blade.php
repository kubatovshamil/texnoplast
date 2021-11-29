<div class="box-modal individual" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>
    <h1 class="individual__title">Заказать звонок</h1>
    <form action="{{ route('order.phone') }}" class="individual-order" method="post">
        @csrf
        <div class="form-group">
            <input type="text" class="individual-order__inp" id="fullname" name="fullname" placeholder="ФИО">
        </div>

        <div class="form-group">
            <input type="tel" id="#phone" data-name="phone" id="phone" name="phone" class="individual-order__inp" placeholder="Телефон">
        </div>
        <div class="form-group">
            <button id="send" class="individual-order__btn">Отправить</button>
        </div>
    </form>

</div>

<script src="{{ asset('libs/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script>
    $(document).find('input[type="tel"]').mask("+7 (999) 999-99-99");
    $(document).find('.individual-order').validate({
        rules: {
            fullname: {
                required : true,
                maxlength: 40,
                minlength : 12,
            },
            phone: {
                required : true,
            },
        },
        messages: {
            fullname: {
                required: "ФИО обязателен для ввода",
                maxlength: "ФИО не может быть больше чем 40 букв",
                minlength: "ФИО не должна быть меньше чем 12 букв"
            },
            phone: {
                required: "Имя обязателен для ввода",
            },
        }
    });
</script>
