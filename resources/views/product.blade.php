@extends('header')
@section('title', 'Интернеи магазин: Товар')
@section('content')
    <div id="app">
    <head>
<!--
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/starter-template.css" rel="stylesheet">
-->
    </head>

    <body>

    <router-view :key="$route.fullPath"> </router-view>

    <script src="{{asset('js/app.js')}}" defer></script>
    </body>

    </div>
@endsection

