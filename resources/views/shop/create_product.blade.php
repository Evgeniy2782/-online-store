@extends('header')
@section('title', 'Category')
@section('content')

   

    <br><br><br>

    <div class = "container">
        <h2>Добавте товар</h2>
        <form id = "form-addItem"
              method="post"
              action="{{ route('create-product') }}"
              enctype="multipart/form-data">
            @csrf

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

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">User picture</span>
                </div>
                <div class="custom-file">
                    <input type="file"
                           class="custom-file-input"
                           id="inputGroupFile01"
                           name="picture"
                           aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>

            <div class="form-group">
                <label for="item">Наименование товара</label>
                <input name="item" type="text" class="form-control" id="item" placeholder="Введите наименование товара" value="{{ old('item') }}">
            </div>

            <div class="form-group">
                <label for="description">Описание товара</label>
                <input name="description" type="text" class="form-control" id="description" placeholder="Описание товара" value="{{ old('description') }}">
            </div>

            <div class="form-group">
                                    <label for="category_id"> Выберите категорию </label>
                                    <select name="category_id"
                                            id="category_id"
                                            class="form-control"
                                            value=""
                                            placeholder=""
                                            required>

                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if( $categoryOption->id ) selected @endif>
                                            {{ $categoryOption->category }}

                                        </option>
                                    @endforeach

                                    </select>
                                </div>

            <div class="form-group">
                <label for="price">Цена товара</label>
                <input name="price" type="number" class="form-control" id="price" placeholder="Описание товара" value="{{ old('price') }}">
            </div>

            <button type="submit" class="btn btn-primary">Добавить товар</button>

        </form>
    </div>

    <br><br><br>
    <br><br><br>

@endsection
