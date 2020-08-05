@extends('header')
@section('title', 'Profile')
@section('content')

<br><br><br>

<div class="container">

    <div class="col-lg-12 md-5">

        <div class="row">

           @foreach($users as $user)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">

                    <img class="card-img-top" src="{{ asset( 'storage/' . $user -> picture ) }}" alt="">

                    <div class="card-body">
                        <h4 class="card-title">

                            <h4>Name: {{  $user->name }} </h4>
                            
                            <a href=" {{ route('view-edit-user', $user->id) }} " type="button" class="btn btn-outline-primary">Редактировать</a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>

</div>

<br><br><br>

@endsection

