@extends('header')
@section('title', 'Profile')
@section('content')

<br><br><br>

<div class="container">

    <div class="col-lg-12 md-5">

        <div class="row">

           @foreach($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">

                    <img class="card-img-top" src="{{ asset( 'storage/' . $product -> picture ) }}" alt="">

                    <div class="card-body">
                        <h4 class="card-title">

                            <h4>Товар {{  $product->item }} </h4>
                            <p class="card-text">описание  {{  $product->description }}></p>
                            <p class="card-text">цена  {{  $product->price }} руб.</p>

                            <a href=" {{ route('view-edit-product', $product->id) }} " type="button" class="btn btn-outline-primary">Редактировать</a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>

</div>

<br><br><br>

@endsection

