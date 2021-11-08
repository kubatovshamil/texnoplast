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
                        <h1 class="m-0">Редактирования товара</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Редактирование товара</li>
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
                            <form id="edit" action="{{route('products.update', [$product->id])}}" method="post">
                                @csrf
                                @method("PUT")
                                <input type="hidden" id="attributes" value='@json($items)'>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInput1">Наименования товара </label>
                                        <input type="text" class="form-control" value="{{$product->title}}" name="title" id="exampleInput1" placeholder="Введите название категории">
                                    </div>
                                    @if($product->category_id)
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Категория:</label>
                                            <select name="category_id" class="form-control" id="sel1">
                                                @foreach($categories as $item)
                                                    <option value="{{$item->id}}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="exampleInput1">Цена товара</label>
                                        <input type="number" class="form-control" name="price" id="exampleInput1" value="{{$product->price}}" placeholder="Введите ссылку категории">
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInput1">Старая цена товара</label>
                                        <input type="number" class="form-control" name="discount" id="exampleInput1" value="{{$product->discount}}" placeholder="Введите старую цену товара">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Ссылка категории</label>
                                        <input type="text" class="form-control" name="slug" id="exampleInput1" value="{{$product->slug}}" placeholder="Введите ссылку категории">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Изборажения товара</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" value="{{$product->img}}" name="img" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Описание товара</label>
                                        <input type="text" class="form-control" name="keywords" id="exampleInput1" value="{{$product->specification}}" placeholder="Введите описание товара">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea3">Описание товара</label>
                                        <textarea class="form-control" name="specification" id="exampleFormControlTextarea3" rows="7">{{$product->specification}}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInput1">Мета данные описание </label>
                                        <input type="text" class="form-control" name="descriptions" id="exampleInput1" value="{{$product->descriptions}}" placeholder="Введите ключевые слова">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInput1">Мета данные ключевые слова </label>
                                        <input type="text" class="form-control" name="keywords" id="exampleInput1" value="{{$product->keywords}}" placeholder="Введите ключевые слова">
                                    </div>

                                    @foreach($attributes as $attribute)
                                        <div class="form-row">

                                            <div class="form-group col-md-5">
                                                <select name="attr_name[]" id="select" class="form-control">
                                                    @foreach($items as $item)
                                                        @if($item->name == $attribute->name)
                                                            <option selected value="{{$item->id}}">{{$item->name}}</option>
                                                        @else
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <button id="switch" class="btn btn-link">Переключить</button>
                                            </div>

                                            <div class="form-group col-md-5">
                                                <input type="text" id="input" class="form-control" name="attr_val[]" value="{{$attribute->value}}">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <button id="remove" class="btn btn-danger">Удалить</button>
                                            </div>
                                        </div>
                                    @endforeach

                                    <button id="add" class="btn btn-dark">Задать характеристики</button>

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
