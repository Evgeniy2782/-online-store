@extends('header')
@section('title', 'Shop')
@section('content')

    <br><br><br>

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
                                    <strong> Товар  </strong>
                                </div>
                            </header>
                        </div>

                        <strong>
                            <form method = "post" >
                                <div class="form-group">
                                    <div class="panel-body">
                                        <div class="text-center" id="author">
                                            <img src=" {{ asset( 'storage/' . $product -> picture ) }} " width = 100% >
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
                        <li class="active1"><H4>Товар: {{ $product->item }} </H4></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <hr>
                        <div class="tab-pane fade active in" id="detail">

                            <form id = "user-edite-profile"
                                  method = "post"
                                  enctype="multipart/form-data"
                                  action=" {{ route( 'edit-product', $product->id) }} ">
                                @method('PATCH')
                                @csrf

                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <label for="email">id</label>
                                    <input type="text" class="form-control" name="id" disabled id="id" value="{{$product->id}}">
                                </div>

                                <div class="form-group">
                                    <label for="item">Товар</label>
                                    <input type="text" name="item" class="form-control"  id="item" value="{{ $product->item }}" >
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control"  id="description" value="{{ $product->description }}" >
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}" >
                                </div>

                                <div class="form-group">
                                    <label for="category_id"> Выберите категорию </label>
                                    <select name="category_id"
                                            id="category_id"
                                            class="form-control"
                                            placeholder=""
                                            required>

                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if( $categoryOption->id == $product->category_id ) selected @endif>
                                            {{ $categoryOption->category }}

                                        </option>
                                    @endforeach

                                    </select>
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
                                    <label class="form-check-label" for="exampleCheck">Active-</label>
                                    <input type="checkbox" name="active" class="form-check-input" id="exampleCheck" {{$product->active ? 'checked' : 'off'}} >
                                </div>

                                <button type="submit" class="btn btn-primary" >Редактировать</button>
                                <br>
                                <br>

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

    <br><br><br>

@endsection



