<div class="box-modal individual" id="Modal">

    <div class="box-modal_close arcticmodal-close">&#10006;</div>
    <h1 class="individual__title">от Поставщика</h1>
    <form action="{{route('order.provider')}}" class="individual-order" method="post">
        @csrf
        <div class="form-group">
            <input type="text" class="individual-order__inp" name="surname" placeholder="Фамилия">
        </div>

        <div class="form-group">
            <input type="text" class="individual-order__inp" name="name" placeholder="Имя">
        </div>

        <div class="form-group">
            <input type="tel" class="individual-order__inp" name ="phone" placeholder="Телефон">
        </div>

        <div class="form-group">
            <textarea class="individual-order__inp" name="note" cols="40" rows="30" placeholder="Ваще предложение"></textarea>
        </div>

        <button class="individual-order__btn">Отправить</button>

    </form>

</div>

<script src="{{ asset('libs/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script>
    $(document).find('input[type="tel"]').mask("+7 (999) 999-99-99");
</script>
