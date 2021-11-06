$(document).ready(function() {

    $('form').on('click', '.btn-link', function (e){
        e.preventDefault();


    });

    $('form').on('click', '#remove', function (e){
        e.preventDefault();
        $(this).parent().parent()
            .remove();
    });

    $('#switch').on('click', function (e){
        e.preventDefault();
        if($(this).parent().find('#input').length){
            $(this).parent().find('#input').remove();
            createSelect()
        }else{
            $(this).parent().find('select').remove();
            createInput();
        }
    });

    //created input row
    $('#add').on('click', function (e) {
        e.preventDefault();

    });

    function createInput(){
        let input = document.createElement('input'),
            switcher = document.querySelector('#switch');
        input.type = "text";
        input.className = "form-control";
        input.name = "attr_name[]";
        input.id = "input";
        switcher.before(input);
    }
    function createSelect(){
        let switcher = document.querySelector('#switch'),
            select = document.createElement('select'),
            attributes = JSON.parse($('#attributes').val());

        select.className = "form-control";
        select.name = "attr_name[]";
        switcher.before(select);

        attributes.forEach((item) => {
            let option = document.createElement('option');
            option.value = item.id;
            option.text = item.name;
            select.appendChild(option);
        });
    }

    function createForm(){

    }

    function sendAjax(url, form, type){

        $.ajax({
            url: url,
            type: type,
            data:{
                "_token": "{{ csrf_token() }}",
                // data: JSON.stringify(json),
            },
            success:function(response){
                //
            },
            error: function(response) {
                console.error(response);
            },
        });
    }

    $('#create').on('submit', function (e){
        // e.preventDefault();
        // sendAjax("{{ route('products.store') }}", $(this), "POST");
    });

    $('#edit').on('submit', function (e){
        e.preventDefault();
        sendAjax("{{ route('products.update', $product ?? '') }}", $(this), "PUT");
    });


});
