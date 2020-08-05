@extends('header')
@section('title', 'Shop')
@section('content')

<div class="container">

<br>
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

    <div class="col-lg-8 col-md-8 col-xs-12 ">
        <div class="panel ">
            <div class="panel-body">
                <ul id="myTab" class="nav nav-pills">
                <li class="active"><H3> Закал: {{ $order[0]->name }}  {{$order[0]->patronymic}} <br> Телефон:{{$order[0]->pfone}}</H3></li>
                </ul>
                <hr>

                <ul id="myTab" class="nav nav-pills">
                <li class="active"><H4> Адресс: г {{ $order[0]->city }} ул. {{ $order[0]->street }} {{ $order[0]->house }} кв: {{ $order[0]->flat }} этаж {{ $order[0]->floor }} </H4></li>
                </ul>
                
                <div id="myTabContent" class="tab-content">
                    <hr>
                   
                        <form id = "order-registration"
                              method = "post"
                              action="{{ route('edit-status-order', $order[0]->order_id) }}">
                              @csrf

                            <div class="form-group">
                           
                            @php $i = 0; @endphp  
                            @foreach( $order as $item )
                           
                            <div class="form-group">
                   
                             <label for="name" ><h5>{{ ++$i }}  Товар: {{ $item->item }} </h5>  </label> 
                             <label for="name"> <h5>  шт:    {{ $item->quantity }} </h5> </label>
                             <label for="name"> <h5>  Цена:  {{ $item->price }} руб. </h5> </label>
                             <label for="name"> <h5>  Сумма: {{ $item->price * $item->quantity }} руб. </h5> </label>

                            </div>

                            @endforeach
                            <hr>

                            <ul id="myTab" class="nav nav-pills">                                          
                            <li class="active"><H5> Доставка: {{ $order[0]->delivery }} <br>
                             Произведена оплата: {{ $order[0]->paid }} <br> 
                             Должны оплатить: {{ $order[0]->haveToPay }} </H5></li>
                            </ul>

                            <h4> Сумма: {{ $order[0]->summ }} руб. </h4>

                            <br><br><br>

                            <div class="form-group">
                                    <label for="status_id"> Выберите статус заказа </label>
                                    <select name="status_id"
                                    {{ $userRight->right == 'admin' ? 'id="status_id"' : 'disabled id="status_id"' }}
                                          
                                            class="form-control"
                                            placeholder=""
                                            required>

                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}"
                                                @if( $status->id == $item->status_id ) selected @endif>
                                    {{ $status->status }}
                                        </option>
                                    @endforeach

                                    </select>
                                </div>

                                @if($userRight->right == "admin")
                                <button type="submit" class="btn btn-outline-primary"> Изменить </button>
                                @endif
                            </div>
                            
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


