@extends('header')
@section('title', 'Shop')
@section('content')

<div class="container">

         <br>

    <div class="col-lg-8 col-md-8 col-xs-12 ">
        <div class="panel ">
            <div class="panel-body">
                <ul id="myTab" class="nav nav-pills">

                <li class="active"><H3> Проверьте ваш заказ: {{ $cartToUser[0]->name }}  {{$cartToUser[0]->patronymic}}</H3></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <hr>
                   
                        <form id = "order-registration"
                              method = "post"
                              action="{{ route('order-registration') }}">
                              @method('PATCH')
                              @csrf

                            <div class="form-group">
                           
                            @php $i = 0; @endphp  
                            @foreach( $cartToUser as $item )
                           
                            <div class="form-group">
                   
                             <label for="name" ><h4>{{ ++$i }}  Товар: {{ $item->item }} </h4>  </label> 
                             <label for="name"> <h4>  шт:    {{ $item->quantity }} </h4> </label>
                             <label for="name"> <h4>  Цена:  {{ $item->price }} руб. </h4> </label>
                             <label for="name"> <h4>  Сумма: {{ $item->price * $item->quantity }} руб. </h4> </label>
                                
                            </div>

                            @endforeach
                            <hr>

                            <h4> Сумма: {{ $summOrder }} руб. </h4>
                            <br>
                            </div>

                            <div class="form-group">
                                    <label for="deliveryAndPay"> Выберите категорию </label>
                                    <select name="deliveryAndPay"
                                            id="deliveryAndPay"
                                            class="form-control"
                                            placeholder=""
                                            required>

                                    @foreach($optionDeliveryAndPay as $deliveryAndPay)
                                        <option value="{{ $deliveryAndPay->id }}"
                                                @if( $deliveryAndPay->id == $deliveryAndPay->delivery_pay ) selected @endif>
                                            {{ $deliveryAndPay->delivery_pay }}

                                        </option>
                                    @endforeach

                                    </select>
                                </div>


                            <button type="submit" class="btn btn-primary"> Заказать </button>
                            <br>
                            <br>

                     <div class="tab-pane fade" id="contact">
                  </div>
                </div>
              </div>
          </div>
      </div>
  
<script src="/js/profile_jquery-1.11.3.min.js"></script>
<script src="/js/profile_bootstrap.min.js"></script>

<link href="/css/profile_bootstrap.min.css" rel="stylesheet">
<link href="/css/profile_font-awesome.min.css" rel="stylesheet">
<link href="/css/styleProfile.css" rel="stylesheet">
</div>

@endsection


