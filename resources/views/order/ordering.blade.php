@extends('header')
@section('title', 'Category')
@section('content')

    <br>

    <div class = "container">
        <h2>Оформление заказа</h2>

        <br>

        <form id = "form-addItem"
              method="post"
              action="{{ route('create-order') }}"
              enctype="multipart/form-data">
            @csrf

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
          
            <h3>ФИО</h3>

            <div class="form-group">
              
               <div class="row">

               <div class="col">
               <input type="text" class="form-control" name="surname" id="surname" placeholder="Фамилия" value="{{ $userAndAddress ? $userAndAddress[0]->surname : old('surname') }}">
               </div>

               <div class="col">
               <input type="text" class="form-control" name="name" id="name" placeholder="Имя" value="{{ $userAndAddress ? $userAndAddress[0]->name : old('name') }}">
               </div>

               <div class="col">
               <input type="text" class="form-control" name="patronymic" id="patronymic" placeholder="Отчество" value="{{ $userAndAddress ? $userAndAddress[0]->patronymic : old('patronymic') }}">
               </div>
               </div>
               <br>

               <div class="col">
               <label for="pfone">Телефон</label> <br>
               <input type="text" class="input-medium bfh-phone" name="pfone" id="pfone" data-format="+7 (ddd) ddd-dddd" value="{{ $userAndAddress ? $userAndAddress[0]->pfone : old('pfone') }}">
               </div>
              
            </div>

             <h3> Адрес доставки </h3>

            <div class="form-group">
                <label for="city">Город</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Город" value="{{ $userAndAddress ? $userAndAddress[0]->city : old('city') }}">
            </div>

            <div class="form-group">
                <label for="street">Улица</label>
                <input name="street" type="text" class="form-control" name="street" id="street" placeholder="Улица" value="{{ $userAndAddress ? $userAndAddress[0]->city : old('city') }}">
            </div>

            <div class="row">

           <div class="col">
           <input type="text" class="form-control" name="house" id="house" placeholder="дом" value="{{ $userAndAddress ? $userAndAddress[0]->house : old('house') }}">
           </div>

           <div class="col">
           <input type="text" class="form-control" name="flat" id="flat" placeholder="Квартира" value="{{ $userAndAddress ? $userAndAddress[0]->flat : old('flat') }}">
           </div>

          <div class="col">
          <input type="text" class="form-control" name="floor" id="floor" placeholder="Этаж" value="{{ $userAndAddress ? $userAndAddress[0]->floor : old('floor') }}">
          </div>
          </div>

           <br>
            
           <button type="submit" class="btn btn-primary"> Оформить заказ </button>
         
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="/js/bootstrap-formhelpers-phone.js"></script>
        

        </form>
    </div>

    <br><br><br>

@endsection