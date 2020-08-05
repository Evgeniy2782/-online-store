@extends('header')
@section('title', 'Shop')
@section('content')

<script src="/js/profile_jquery-1.11.3.min.js"></script>
<script src="/js/profile_bootstrap.min.js"></script>

<link href="/css/profile_bootstrap.min.css" rel="stylesheet">
<link href="/css/profile_font-awesome.min.css" rel="stylesheet">
<link href="/css/styleProfile.css" rel="stylesheet">

<div class="container">
<div>
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <span aria-hidden="true"></span>

                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div>
            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">

                            <span aria-hidden="true"></span>

                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    <div id="main">

        <div class="row" id="real-estates-detail">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <header class="panel-title">
                            <div class="text-center">
                                <strong>Пользователь сайта</strong>
                            </div>
                        </header>
                    </div>

                    <strong>
                        <form method = "post" >
                            <div class="form-group">
                                <div class="panel-body">
                                    <div class="text-center" id="author">
                                        <img src="{{  asset( 'storage/' . $user[0]->picture) }}"width = 100% >
                                        <!--<img src="/assets/img/funny.jpg" width = 100% >-->
                                    </div>
                        </form>
                    </strong>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-xs-12">
        <div class="panel">
            <div class="panel-body">
                <ul id="myTab" class="nav nav-pills">
                    <li class="active"><H4>Профиль пользователя: {{ $user[0]->email }}</H4></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <hr>
                    <div class="tab-pane fade active in" id="detail">

                        <form id = "user-edite-profile"
                              method = "post"
                              enctype="multipart/form-data"
                              action=" {{ route( 'edit-user', $user[0]->id) }} ">
                              @method('PATCH')
                              @csrf

                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label for="email">id</label>
                                <input type="text" class="form-control" name="id" disabled id="id" value="{{ $user[0]->id }}">
                            </div>

                            <div class="form-group">
                                <label for="right">Right</label>
                                <input type="text" name="right" class="form-control" {{ $user[0]->right == 'admin' ? 'id="id"' : 'disabled id="right"' }} value="{{$user[0]->right}}" >
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control"  id="name" value="{{ $user[0]->name }}" >
                            </div>

                            <div class="form-group">
                                <label for="login">Login</label>
                                <input type="email" name="login" class="form-control" id="login" value="{{ $user[0]->email }}" >
                            </div>

                            <div class="form-group">
                                <label for="new_password">Введите новый пароль</label>
                                <input type="password" name="new_password" class="form-control" id="new_password" value = "{{ $user[0]->password }}" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="password">Введите новый пароль</label>
                                <input type="password" name="password" class="form-control" id="password" value = "{{ $user[0]->password }}" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input
                                    type="file"
                                    class="form-control-file"
                                    id="img"
                                    name="picture">
                                <label for="img">Загрузить фото</label>
                            </div>

                            <div class="form-group form-check">
                                <label class="form-check-label" for="exampleCheck1">Active-</label>
                                <input type="checkbox" name="active" class="form-check-input" id="exampleCheck1" {{ $user[0]->active ? 'checked' : '' }} >
                            </div>

                            <button type="submit" class="btn btn-primary" >Редактировать</button>
                            <br>
                            <br>
                             @if($user[0]->right  == "admin")
                            <a href="{{ route('new-category') }}" class="btn btn-primary">New category</a>
                            <a href="{{ route('view-edit-categories') }}" class="btn btn-primary">categories edit</a>
                            <a href="{{ route('new-product') }}" class="btn btn-primary">New product</a>
                            <a href="{{ route('view-edit-products') }}" class="btn btn-primary">products edit</a>
                            <a href="{{ route('view-edit-users') }}" class="btn btn-primary">users edit</a>
                            <a href="{{ route('orders') }}" class="btn btn-primary">orders</a>
                            <a href="{{ route('statistics') }}" class="btn btn-primary">statistic</a>
                             @endif

                    </div>

                    <div class="tab-pane fade" id="contact">
                        <p></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div><!-- /.main -->
</div><!-- /.container -->


@endsection


