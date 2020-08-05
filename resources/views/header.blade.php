<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
</head>

<link href="{{asset('css/app.css')}}" rel ="stylesheet">

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Магазин</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('shop')}}">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('profileUser')}}">profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cart')}}">Basket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('get-logout')}}">Log out</a>
            </li>
        </ul>    </div>

</nav>

@yield('content')
<!-- Footer -->
<footer id="footer" class="py-5 bg-dark">
<div class="container">
<p class="m-0 text-center text-white">Shop</p>
</div>
<!-- /.container -->
</footer>
<link href="/css/orders-view.css" rel="stylesheet">
