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
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInput1">Наименования категории </label>
                                    <select class="form-control" id="sel1">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Наименование товара</label>
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите название товара">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Цена товара</label>
                                    <input type="number" class="form-control" id="exampleInput1" placeholder="Введите цену товара">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Описание товара</label>
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите описание товара">
                                </div>

                                
                                <div class="form-group">
                                    <label for="exampleInput1">Скидка товара</label>
                                    <input type="number" class="form-control" id="exampleInput1" placeholder="Введите скидку товара">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Изборажения товара</label>
                                     <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Ссылка товара</label>
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите ссылку товара">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Описание </label>
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите описание">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Ключевые слова </label>
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите ключевые слова">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Хит продаж</label>
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите хит товара">
                                </div>

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
