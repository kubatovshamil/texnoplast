<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Идивидуальный заказ</title>
</head>
<body>
<p><strong>Фамилия:</strong> {{ $order->surname }}</p>
<p><strong>Имя:</strong> {{ $order->name }} </p>
<p><strong>Телефон:</strong> {{ $order->phone }} </p>
<p><strong>Описание :</strong> {{ $order->note }} </p>

</body>
</html>
