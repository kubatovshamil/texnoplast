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
                        <h1 class="m-0">Список заказов</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Список заказов</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Таблица заказов</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Fullname</th>
                                        <th>mobile</th>
                                        <th>email</th>
                                        <th>city</th>
                                        <th>street</th>
                                        <th>house</th>
                                        <th>apartament</th>
                                        <th>note</th>
                                        <th>edit</th>
                                        <th>show</th>
                                        <th>delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->fullname }}</td>
                                            <td>{{ $order->mobile  }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->city }}</td>
                                            <td>{{ $order->street  }}</td>
                                            <td>{{ $order->house ?? 'null'  }}</td>
                                            <td>{{ $order->apartament ?? 'null'  }}</td>
                                            <td>{{ $order->note }}</td>
                                            <td><a href="{{route('orders.edit', [$order->id])}}" class="btn btn-success">Edit</a></td>
                                            <td><a href="{{route('orders.show', [$order->id])}}" class="btn btn-info">Show</a></td>
                                            <td>
                                                <form action="{{route('orders.destroy', $order->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                {{ $orders->links('admin.pages.paginate') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
