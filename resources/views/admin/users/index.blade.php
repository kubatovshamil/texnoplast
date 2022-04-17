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
                        <h1 class="m-0">Список Пользователей</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Cписок Пользователей</li>
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
                                <h3 class="card-title">Таблица Пользователей</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>email</th>
                                        <th>Фамилия</th>
                                        <th>Имя</th>
                                        <th>role</th>
                                        <th>edit</th>
                                        <th>show</th>
                                        <th>delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->surname }}</td>
                                            <td> {{ $user->name }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td><a href="{{route('users.edit', [$user->id])}}" class="btn btn-success">Edit</a></td>
                                            <td><a href="{{route('users.show', [$user->id])}}" class="btn btn-info">Show</a></td>
                                            <td>
                                                <form action="{{route('users.destroy', $user->id)}}" method="post">
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
                                {{ $users->links('admin.pages.paginate') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
