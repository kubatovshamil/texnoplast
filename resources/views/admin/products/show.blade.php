@extends('admin.layout')

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
                        <h1 class="m-0">Страница Продукта</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Страница Продукта</li>
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
                            <label>Наименования товара: </label>
                            <p>{{$product->title}}</p>
                        </div>

                        <div>
                            <label>category_id: </label>
                            <p>{{$product->category_id}}</p>
                        </div>


                        <div>
                            <label>Ссылка товара: </label>
                            <p>{{$product->slug}}</p>
                        </div>

                        <div>
                            <label>Описание товара: </label>
                            <p>{{$product->descriptions}}</p>
                        </div>

                        <div>
                            <label>Ключевые слова товара: </label>
                            <p>{{$product->keywords}}</p>
                        </div>


                        <div>
                            <label>Изображения товара: </label>
                            <br>
                            <img src="{{asset("storage/products/" . $product->img)}}" alt="not found" width="150" height="150">
                            @if(isset($gallery))
                                @foreach($gallery as $img)
                                    <img src="{{asset("storage/products/" . $img->img)}}" alt="not found" width="150" height="150">
                                @endforeach
                            @endif
                        </div>

                        <div class="col-sm-6">
                            <table class="table table-striped">
                                <thead>
                                <th>Наименования</th>
                                <th>Значения</th>
                                </thead>
                                <tbody>
                                @foreach($attributes as $attribute)
                                    <tr>
                                        <td>{{$attribute->name}}</td>
                                        <td>{{$attribute->value}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
