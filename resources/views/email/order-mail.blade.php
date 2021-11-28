<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заказ подтверждения</title>
</head>
<body>
<h5>Имя и Фамилия : {{ $order->fullname }} <br></h5>
<p>E-mail: <a href="{{ $order->email }}">{{ $order->email }}</a></p>
<p>Страна : {{ $order->country }}</p>
<p>По адресу : {{ $order->city }} {{ $order->street }} {{ $order->house?? '' }} {{ $order->apartment?? '' }}</p>
<p>Номер телефона :{{ $order->mobile }}</p>

<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Наименование</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Сумма</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->session()->get('cart') as $item)
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;">{{$item['title']}}</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $item['quantity'] }}</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $item['price'] }}₽</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{  $item['price'] * $item['quantity'] }} </td>
        </tr>
    @endforeach
    @php $total = 0 @endphp
    @foreach((array) $order->session()->get('cart') as $id => $details)
        @php $total += $details['price'] * $details['quantity'] @endphp
    @endforeach
    <tr>
        <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">Итого:</td>
        <td style="padding: 8px; border: 1px solid #ddd;">{{ $total }}₽</td>
    </tr>
    </tbody>
</table>

</body>
</html>
