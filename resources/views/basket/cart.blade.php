@extends('header')
@section('title', 'basket')
@section('content')

<div class="container">
<div class="row">
<div class="col-lg-3">
         
            <div>
            <div class="list-group" >
      
             <h4 class="my-4"> Заказы товаров</h4>
             <a href="{{ route('user-orders', [$userId]) }}" class="list-group-item" > Заказы </a>

            </div>
          </div>
        </div>

<div class="col-lg-9">      
<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
<div class = "jumbotron">
<h2 class="display-6 text-center" >Корзина </h2>
<p class = "lead text-center">Information </p>
</div>
</div>

<div class="col-lg-12 md-5">
</div>
<div class="row">
@php $i = false; @endphp  
@foreach($cartToUser as $item)

<form id = "user-edite-profile"
    method = "post"
    action=" {{ route( 'delete-item', $item->item_id) }} ">
    @csrf
   <!--{{$i = true}}-->
<div class="col-lg-4 col-md-6 mb-4">
<div class="card h-100">
<img class="card-img-top" src="{{ asset( 'storage/' . $item -> picture ) }}" alt="">
<div class="card-body">
<h4 class="card-title">{{ $item->item }}</h4>
<h4> {{ $item->price }} </h4>
<p class="card-text">{{ $item->description }}</p>
<p class="card-text">{{ $item->quantity }} шт.</p>


<button type="submit" class="btn btn-outline-primary"> Удалить </button>

</div>
</div>
</div>

@endforeach 

</div>
<hr>
<div class="button-wrapper">
@if($i == true)
<a href="{{ route('ordering') }}" type="button" class="btn btn-outline-success"> Оформить заказ </a>
@endif
</div>
</div>
</div>
</div>
<br>

<link href="/css/cart.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
</div>

@endsection
