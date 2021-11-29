@extends('admin.layouts.index')

@section('content')
    <div class="content-wrapper">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Страница Заказа</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Страница Заказа</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <label>ФИО: </label>
                            <p>{{$order->fullname}}</p>
                        </div>

                        <div>
                            <label>Телефон: </label>
                            <p>{{$order->mobile}}</p>
                        </div>


                        <div>
                            <label>Email: </label>
                            <p>{{$order->email}}</p>
                        </div>

                        <div>
                            <label>Город: </label>
                            <p>{{$order->city}}</p>
                        </div>

                        <div>
                            <label>улица: </label>
                            <p>{{$order->street}}</p>
                        </div>

                        <div>
                            <label>улица: </label>
                            <p>{{$order->street}}</p>
                        </div>

                        <div>
                            <label>улица: </label>
                            <p>{{$order->house ?? 'null'}}</p>
                        </div>

                        <div>
                            <label>улица: </label>
                            <p>{{$order->apartment ?? 'null'}}</p>
                        </div>


                        <div>
                            <label>описание: </label>
                            <p>{{$order->note}}</p>
                        </div>


                    </div>
                    <ul>
                        @foreach($order_products as $order_product)
                            <li> Наименования продукта : {{ $order_product->title }}</li>
                            <li> Количество : {{ $order_product->quantity }}</li>
                            <li> цена : {{ $order_product->price }}руб</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
