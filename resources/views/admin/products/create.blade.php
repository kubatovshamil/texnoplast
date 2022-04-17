@extends('admin.layouts.index')
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
                            <form class="form-product" id="create" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="attributes" value='@json($attributes)'>
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
                                        <label for="exampleFormControlFile1">Изображения товара</label>
                                        <input type="file" class="form-control-file" name="img[]" id="exampleFormControlFile1" multiple>
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
                                        <input class="form-check-input" name="hit" type="checkbox" value="1" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                           <strong>Хит</strong>
                                        </label>
                                    </div>
                                    <button id="add" class="btn btn-dark">Задать характеристики</button>
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
