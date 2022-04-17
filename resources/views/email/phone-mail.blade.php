<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заказ звонка</title>
</head>
<body>
<p><strong>Ф.И.О:</strong> {{ $order->fullname }}</p>
<p><strong>Телефон:</strong> <a href="tel:{{$order->phone}}">{{ $order->phone }}</a></p>

</body>
</html>
