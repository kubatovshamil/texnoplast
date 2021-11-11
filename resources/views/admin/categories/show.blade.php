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
                        <h1 class="m-0">Список категорий</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Список категорий</li>
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
                            <label>Наименования категории: </label>
                            <p>{{$category->title}}</p>
                        </div>

                        <div>
                            <label>parent_id: </label>
                            <p>{{ $category->parent_id ?? 'null' }}</p>
                        </div>

                        <div>
                            <label>Ссылка категории: </label>
                            <p>{{$category->slug}}</p>
                        </div>

                        <div>
                            <label>Картинка категории: </label>
                            <div class="cart-img">
                                <img src="{{asset('storage/category/' . $category->img)}}" width="150" height="150" alt="not found">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
