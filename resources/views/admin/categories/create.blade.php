@extends('admin.layout')

@section('content')

    <div class="content-wrapper">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

            @if(count($errors) > 0)
                <div class="p-1">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button></div>
                    @endforeach
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
                            <form action="{{route('categories.store')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInput1">Наименования категории </label>
                                        <input type="text" class="form-control" name="title" id="exampleInput1" placeholder="Введите название категории">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Родительская категория:</label>
                                        <select name="parent_id" class="form-control" id="sel1">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Ссылка категории</label>
                                        <input type="text" class="form-control" name="slug" id="exampleInput1" placeholder="Введите ссылку категории">
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
                    <div class="col-md-6">
                        <div class="card card-secondary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Раскрыть форму</h3>

                                <div class="card-tools">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="display: none">
                               <form action="{{route('categories.parent')}}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleInput1">Наименования родительской категории</label>
                                        <input type="text" class="form-control" name="title" id="exampleInput1" placeholder="Введите название родительской категории">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput1">Ссылка родительской категории</label>
                                        <input type="text" class="form-control" name="slug" id="exampleInput1" placeholder="Введите ссылку родительской категории">
                                    </div>

                                   <div class="form-group">
                                       <label for="exampleInputFile">Фотка Родительской категории</label>
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
                                        <label for="exampleInput1">Описание </label>
                                        <input type="text" class="form-control" name="descriptions" id="exampleInput1" placeholder="Введите описание">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Ключевые слова </label>
                                        <input type="text" class="form-control" name="keywords" id="exampleInput1" placeholder="Введите ключевые слова">
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
    </div>

@endsection
