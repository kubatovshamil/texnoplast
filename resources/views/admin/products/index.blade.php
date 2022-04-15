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
                        <h1 class="m-0">Список товаров</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Cписок товаров</li>
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
                                <h3 class="card-title">Таблица Товаров</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Наименование</th>
                                        <th>category_id</th>
                                        <th>slug</th>
                                        <th>img</th>
                                        <th>descriptions</th>
                                        <th>keywords</th>
                                        <th>Edit</th>
                                        <th>show</th>
                                        <th>delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{\Illuminate\Support\Str::limit($product->title, 10) }}</td>
                                            <td>{{ $product->category_id }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($product->slug, 10) }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($product->img, 10) }}</td>
                                            <td>{{\Illuminate\Support\Str::limit($product->descriptions, 10) }}</td>
                                            <td>{{\Illuminate\Support\Str::limit($product->keywords, 10) }}</td>
                                            <td><a href="{{route('products.edit', [$product->id])}}" class="btn btn-success">Edit</a></td>
                                            <td><a href="{{route('products.show', [$product->id])}}" class="btn btn-info">Show</a></td>
                                            <td>
                                                <form action="{{route('products.destroy', $product->id)}}" method="post">
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
                                {{ $products->links('admin.pages.paginate') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
