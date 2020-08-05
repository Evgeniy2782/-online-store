@extends('header')
@section('title', 'edite-categories')
@section('content')


    <br><br><br>

    <div class = "container">

    @foreach($categories as $category)

    <div class="form-group">
    <div class="card">
        <div class="card-header">
            <h5>Категория: {{ $category->category }} </h5>
        </div>
        <div class="card-body">

            <a href="{{ route('view-edit-category', [$category->id]) }}" class="btn btn-primary"> Редактировать категорию </a>

        </div>
    </div>
    </div>

        @endforeach

        </div>
    <br><br><br>
@endsection
