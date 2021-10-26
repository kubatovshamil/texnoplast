@extends('admin.layout')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавления категорий</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Добавления категорий</li>
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
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите название категории">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Родительская категория:</label>
                                    <select class="form-control" id="sel1">
                                        <option>Поликорбонат сотовый</option>
                                        <option>Пластиковая тара</option>
                                        <option>Пластиковые паллеты</option>
                                        <option>Мусорные контейнеры</option>
                                        <option>Деревянные поддоны</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Описание </label>
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите описание">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Ключевые слова </label>
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите ключевые слова">
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
