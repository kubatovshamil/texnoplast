@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирования категории</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Редактирование категории</li>
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
                            <form action="{{route('categories.update', [$category->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInput1">Наименования категории </label>
                                        <input type="text" class="form-control" value="{{$category->title}}" name="title" id="exampleInput1" placeholder="Введите название категории">
                                    </div>
                                    @if($category->parent_id)
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Родительская категория:</label>
                                            <select name="parent_id" class="form-control" id="sel1">
                                                @foreach($categories as $item)
                                                    <option value="{{$item->id}}" {{ $category->parent_id == $item->id? 'selected' : '' }}>{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif


                                    <div class="form-group">
                                        <label for="exampleInput1">Ссылка категории</label>
                                        <input type="text" class="form-control" name="slug" id="exampleInput1" value="{{$category->slug}}" placeholder="Введите ссылку категории">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Изображения</label>
                                        <input type="file" class="form-control-file" name="img" id="exampleFormControlFile1">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Описание </label>
                                        <input type="text" class="form-control" name="descriptions" id="exampleInput1" value="{{$category->descriptions}}" placeholder="Введите описание">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Ключевые слова </label>
                                        <input type="text" class="form-control" name="keywords" id="exampleInput1" value="{{$category->keywords}}" placeholder="Введите ключевые слова">
                                    </div>

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
