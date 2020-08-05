@extends('header')
@section('title', 'Category')
@section('content')

<br><br><br>
<br><br><br>
<br><br><br>


<div class = "container">

<h2>Новая категория</h2>

<form id = "form-user-registration"
      method="post"
      action="{{ route('create-category') }}">
    @csrf
<div class="form-group">

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

  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <input name="category" type="category" class="form-control" id="category" placeholder="Введите название категории" value=" {{ old('category') }} ">
  </div>

  <button type="submit" class="btn btn-primary">Go</button>

</form>
</div>


<br><br><br>
<br><br><br>
<br><br><br>


@endsection
