@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">



        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
            @endforeach
        @endif

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирования пользователя</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item active">Редактирование пользователя</li>
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
                            <form id="edit" action="{{route('users.update', [$user->id])}}" method="post">
                                @csrf
                                @method("PUT")

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInput1">Email: </label>
                                        <input type="text" class="form-control" value="{{$user->email}}" name="email" id="exampleInput1" placeholder="Введите название категории" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Фамилия: </label>
                                        <input type="text" class="form-control" value="{{$user->surname}}" name="surname" id="exampleInput1" placeholder="Введите название категории" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInput1">Имя: </label>
                                        <input type="text" class="form-control" value="{{$user->name}}" name="name" id="exampleInput1" placeholder="Введите название категории" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Роль:</label>
                                        <select name="role" class="form-control" id="sel1">
                                                @if($user->role == 'user')
                                                <option value="{{$user->role}}">{{ $user->role }}</option>
                                                <option value="admin">admin</option>
                                                @elseif($user->role == 'admin')
                                                <option value="{{$user->role}}">{{ $user->role }}</option>
                                                <option value="user">user</option>
                                                @endif
                                        </select>
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
