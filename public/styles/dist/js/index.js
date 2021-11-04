$(document).ready(function() {

    $('#add').on('click', function (e) {
        e.preventDefault();
        var html =  $('#first-group .add-input').clone();
        html.append('<div class="form-group col-md-2" id="btn"><button class="btn btn-danger">удалить</button></div>');
        html.find('input').val('').end().appendTo('.form-more');
    });

    $('form').on('click', '.btn-link', function (e){
        e.preventDefault();
        $(this).parent().find('#dropdown').prop('selectedIndex', 0);
        $(this).parent().find("#nameAttr").val('');
        $(this).parent().find("#nameAttr").toggle();
        $(this).parent().find("#dropdown").toggle();
    });

    $('form').on('click', '#btn', function (e){
        e.preventDefault();
        $(this).parent().remove();
    });

    $('#create-input').on('click', function (e){
        e.preventDefault();
        var html = '';
        html += '<div id="first-group">' +
            '</div><div class="form-row add-input">' +
            '<div class="form-group col-md-5 inps">' +
            '<input type="text" class="form-control attr_name" data-id="0" name="attr_name[]" id="nameAttr"></div>' +
            '<div class="form-group col-md-5"><input type="text" class="form-control attr_value" name="attr_val[]" id="inputCity"></div>' +
            '<div class="form-group col-md-2" id="btn"><button class="btn btn-danger">удалить</button></div></div>';

        $('.form-more').before(html);
    });


});
