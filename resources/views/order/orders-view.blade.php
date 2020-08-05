@extends('header')
@section('title', 'edite-categories')
@section('content')

    <br><br><br>

    <div class = "container">

    @foreach($orders as $order)
    @if($order->status_id !== 4 && $order->status_id !== 3)

    <div class="form-group">
    <div class="card">
        <div class="card-header">
            <h5>Заказ: ID {{ $order->id }} {{ $order->created_at }} </h5>
        </div>
        <div class="card-body">

            <a href="{{ route('order', [$order->id]) }}" class="btn btn-primary"> Заказ </a>

        </div>
    </div>
    </div>
     @endif
     @endforeach

        </div>
    <br><br><br>
@endsection
