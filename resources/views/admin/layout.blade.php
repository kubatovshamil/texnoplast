<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('styles/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('styles/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('styles/dist/css/style.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.templates.navbar')

    @include('admin.templates.aside')

    @yield('content')

    @include('admin.templates.footer')
</div>
<script src="{{ asset('styles/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('styles/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('styles/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('styles/dist/js/index.js')}}"></script>

<script type="text/javascript">

    function getFormData($form){
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }

    function getProductJson(data){
        return {
            "title" : data.title,
            "category_id" : data.category_id,
            "price" : data.price,
            "specification" : data.specification,
            "discount" : data.discount,
            'img' : $('#exampleInputFile').val().split('\\').pop(),
            "slug" : data.slug,
            "descriptions": data.descriptions,
            "keywords" : data.keywords,
            "attr" : getAttributes()
        };
    }

    function getAttributes(){
        var data = [];
        $('.form-row').each(function(index, item){

            let name = $(item).find('.attr_name');
            let select = $(item).find('.select_name option:selected');
            let values = $(item).find('.attr_value');

            if($(name).val()){
                data.push({id : $(name).data('id'), name : $(name).val(), value : $(values).val()});
            }
            if($(select).val()){
                data.push({id : $(select).data('id'), name : $(select).val(), value : $(values).val()});
            }
        });
        return data;
    }

    $('.form-product').on('submit',function(e){
        e.preventDefault();
        var json = getProductJson(getFormData($(this)));
        $.ajax({
            url: "{{route('products.store')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                data: JSON.stringify(json),
            },
            success:function(response){
                window.history.back();
                },
            error: function(response) {
                console.error(response);
            },
        });
    });
</script>
</body>
</html>
