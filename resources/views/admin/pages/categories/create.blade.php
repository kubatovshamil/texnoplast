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
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInput1">Ссылка категории</label>
                                    <input type="text" class="form-control" id="exampleInput1" placeholder="Введите ссылку категории">
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
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form action="{{ route('category.add') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInput1">Наименования родительской категории</label>
                                        <input type="text" class="form-control" name="title" id="exampleInput1" placeholder="Введите название родительской категории">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput1">Ссылка родительской категории</label>
                                        <input type="text" class="form-control" name="slug" id="exampleInput1" placeholder="Введите ссылку родительской категории">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Описание </label>
                                        <input type="text" class="form-control" name="descriptions" id="exampleInput1" placeholder="Введите описание">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Ключевые слова </label>
                                        <input type="text" class="form-control" name="keywords" id="exampleInput1" placeholder="Введите ключевые слова">
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
