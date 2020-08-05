@extends('header')
@section('title', 'products')
@section('content')

<link href="/css/starter-template.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<script src="{{asset('js/app.js')}}" defer></script>

<body>

<div id="app">
<div class="container">
<br>
<h3> Пять самых популярных товаров </h3>

<ul class="list-group">
@foreach($fiveMostVisited as $five)

  <li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $five->item }}
    <span class="badge badge-primary badge-pill"> {{ $five->quantity }}</span>
  </li>

@endforeach
</ul>

<h3> Пять самых не популярных товаров </h3>

<ul class="list-group">
@foreach($fiveMostUnvisited as $five)

  <li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $five->item }}
    <span class="badge badge-primary badge-pill"> {{ $five->quantity }}</span>
  </li>

@endforeach
</ul>

<h4> Средний чек </h4>

<ul class="list-group list-group-flush">
  <li class="list-group-item"> <h4> {{ $averageCheck[0]->avg }} руб.</H4> </li>
</ul>


</div>
</body>

@endsection
