@extends('admin.layouts.index')

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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Таблица Категорий</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Наименование</th>
                                        <th>parent_id</th>
                                        <th>ссылка</th>
                                        <th>img</th>
                                        <th>descriptions</th>
                                        <th>keywords</th>
                                        <th>Edit</th>
                                        <th>show</th>
                                        <th>delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{\Illuminate\Support\Str::limit($category->title, 10) }}</td>
                                            <td>{{ $category->parent_id ? $category->parent_id : 'Null' }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($category->slug, 10) }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($category->img, 10) }}</td>
                                            <td>{{\Illuminate\Support\Str::limit($category->descriptions, 10) }}</td>
                                            <td>{{\Illuminate\Support\Str::limit($category->keywords, 10) }}</td>
                                            <td><a href="{{route('categories.edit', [$category->id])}}" class="btn btn-success">Edit</a></td>
                                            <td><a href="{{route('categories.show', [$category->id])}}" class="btn btn-info">Show</a></td>
                                            <td>
                                                <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                {{ $categories->links('admin.pages.paginate') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
