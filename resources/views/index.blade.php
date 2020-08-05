@extends('header')
@section('title', 'products')
@section('content')

<head>
    <meta name="csrf-token" content=" {{ csrf_token() }} ">
</head>

<body>

<div id="app">
   <div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h4 class="my-4">Категории товаров</h4>
            <div>
                @foreach($categories as $category)
                @if($category->active == '1')
            <div class="list-group" >

             <router-link type="button" class="list-group-item" to="{{route('apiCategory', [$category->id], false)}}">{{$category->category}}</router-link>

            </div>
              @endif 
              @endforeach
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">

                <div class="carousel-inner" role="listbox">
                    <div class = "jumbotron">
                        <h3 class="display-6 text-center" >Товары</h3>
                        <p class = "lead text-center">Information  </p>
                        
                    </div>
                </div>
            </div>

            <div class="myPerent" text-center>
                <router-view :key="$route.fullPath"> </router-view>
            </div>

        </div>
     </div>
  </div>
    <!-- /.row -->
</div>

<link href="/css/starter-template.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<script src="{{asset('js/app.js')}}" defer></script>
</body>

@endsection
