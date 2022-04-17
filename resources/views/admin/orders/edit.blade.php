@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">



        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирования заказа</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Редактирование заказа</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form id="edit" action="{{route('orders.update', [$order->id])}}" method="post">
                                @csrf
                                @method("PUT")

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInput1">fullname: </label>
                                        <input type="text" class="form-control" value="{{$order->fullname}}" name="fullname" id="exampleInput1" placeholder="Введите ФИО" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Телефон: </label>
                                        <input type="text" class="form-control" value="{{$order->mobile}}" name="phone" id="exampleInput1" placeholder="Введите телефон" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">email: </label>
                                        <input type="email" class="form-control" value="{{$order->email}}" name="email" id="exampleInput1" placeholder="Введите E-mail" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Город: </label>
                                        <input type="text" class="form-control" value="{{$order->city}}" name="city" id="exampleInput1" placeholder="Введите город" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInput1">Улица: </label>
                                        <input type="text" class="form-control" value="{{$order->street}}" name="street" id="exampleInput1" placeholder="Введите улица" required>
                                    </div>

                                    @if($order->house)
                                        <div class="form-group">
                                            <label for="exampleInput1">Дом: </label>
                                            <input type="text" class="form-control" value="{{$order->house}}" name="house" id="exampleInput1" placeholder="Введите улица" required>
                                        </div>
                                    @endif


                                    @if($order->apartment)
                                        <div class="form-group">
                                            <label for="exampleInput1">Квартира: </label>
                                            <input type="text" class="form-control" value="{{$order->apartment}}" name="apartment" id="exampleInput1" placeholder="Введите квартиру" required>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="exampleInput1">Примечание: </label>
                                        <input type="text" class="form-control" value="{{$order->note}}" name="note" id="exampleInput1" placeholder="Введите описание" required>
                                    </div>


                                </div>

                                <div class="card-footer">
                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Назад</a>
                                    <button type="submit" class="btn btn-success float-right">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
