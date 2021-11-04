@extends('admin.layout')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавления товара</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Добавления товара</li>
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
                            <form class="form-product" action="{{route('products.store')}}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInput1">Наименование товара</label>
                                        <input type="text" class="form-control" id="exampleInput1" name="title" placeholder="Введите название товара">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Родительская категория:</label>
                                        <select name="category_id" name="category" class="form-control" id="sel1">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Цена товара</label>
                                        <input type="number" class="form-control" name="price" id="exampleInput1" placeholder="Введите цену товара">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea3">Описание товара</label>
                                        <textarea class="form-control" name="specification" id="exampleFormControlTextarea3" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Старая цена товара</label>
                                        <input type="number" class="form-control" id="exampleInput1" name="discount" placeholder="Введите скидку товара">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Изборажения товара</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="img" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Ссылка товара</label>
                                        <input type="text" class="form-control" id="exampleInput1" name="slug" placeholder="Введите ссылку товара">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Мета теги описание</label>
                                        <input type="text" class="form-control" id="exampleInput1" name="descriptions" placeholder="Введите описание">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Мета теги ключевые слова</label>
                                        <input type="text" class="form-control" id="exampleInput1" name="keywords" placeholder="Введите ключевые слова">
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                           <strong>Хит</strong>
                                        </label>
                                    </div>

                                    <div id="first-group">
                                        <div class="form-row add-input">
                                            <div class="form-group col-md-5 inps">
                                                <input type="text" class="form-control attr_name" data-id="0" name="attr_name[]" id="nameAttr">
                                                @empty(!$attribute_names)
                                                    <select id="dropdown" name="select_name[]" class="form-control select_name">
                                                        <option disabled selected value>Выберите</option>
                                                        @foreach($attribute_names as $item)
                                                            <option data-id="{{ $item->id }}" data-name="{{$item->name}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-link">Переключить</button>
                                                @endempty
                                            </div>

                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control attr_value" name="attr_val[]" id="inputCity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-more"></div>
                                    <button id="add" class="btn btn-dark">Создать поле</button>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
