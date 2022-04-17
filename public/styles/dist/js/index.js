$(document).ready(function() {


    $('form').on('click', '#remove', function (e){
        e.preventDefault();
        $(this).parent().parent()
            .remove();
    });

    $('form').on('click', '#switch', function (e){
        e.preventDefault();
        if($(this).parent().find('#input').length){
            $(this).parent().find('#input').remove();
            createSelect($(this));
        }else{
            $(this).parent().find('select').remove();
            createInput($(this));
        }
    });

    $('#add').on('click', function (e) {
        e.preventDefault();
        $(this).before(createForm());

    });

    function createInput(data){
        let input = document.createElement('input'),
            switcher = document.querySelector('#switch');
        input.type = "text";
        input.className = "form-control";
        input.name = "attr_name[]";
        input.id = "input";
        data.before(input);
    }

    function createSelect(data){
        let select = document.createElement('select'),
            attributes = JSON.parse($('#attributes').val());

        select.className = "form-control";
        select.name = "attr_name[]";
        data.before(select);

        attributes.forEach((item) => {
            let option = document.createElement('option');
            option.value = item.id;
            option.text = item.name;
            select.appendChild(option);
        });
    }

    function createForm(){
        let formRow = '<div class="form-row">';
        formRow += '<div class="form-group col-md-5">';
        formRow += '<input type="text" id="input" class="form-control" name="attr_name[]">';
        formRow += '<button id="switch" class="btn btn-link">Переключить</button>';
        formRow += '</div>';
        formRow += '<div class="form-group col-md-5">';
        formRow += '<input type="text" id="input" class="form-control" name="attr_val[]">';
        formRow += '</div>';
        formRow += '<div class="form-group col-md-2">';
        formRow += '<button id="remove" class="btn btn-danger">Удалить</button>';
        formRow += '</div></div>';
        return formRow;
    }

});
