$(document).ready(function() {

    $('#add').on('click', function (e) {
        e.preventDefault();
        var html =  $('#first-group .form-row').clone();
        html.append('<div class="form-group col-md-2" id="btn"><button class="btn btn-danger">удалить</button></div>');
        html.find('input').val('').end().appendTo('.form-more');
    });

    $('form').on('click', '.btn-link', function (e){
        e.preventDefault();
        $(this).parent().find('#dropdown').prop('selectedIndex', 0);
        $(this).parent().find("#nameAttr").toggle();
        $(this).parent().find("#dropdown").toggle();
    });

    $('form').on('click', '#btn', function (e){
        e.preventDefault();
        $(this).parent().remove();
    });

});
