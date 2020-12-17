@extends('layout.all_user')
@section('title', 'signin')
@section('content')
    <section id="sign-in">
      <div class="container">

        <div class="w-100 color2">

        <h2 class="text-center">{{__('all.signin')}}</h2>
        </div>
      <form method="post" action="{{ route('login') }}" enctype="multipart/form-data">
         @csrf

  <div class="form-group mb-3">
    <label for="exampleInputEmail1">{{__('all.email')}}</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@domain-name.com" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required>
    @error('email')
    <span class="bg-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1">{{__('all.password')}}</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="type your password" pattern="^.{8,}$" required>
    @error('password')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-group row">
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('all.remember_me') }}
                </label>
            </div>
        </div>
    </div>


  <button type="submit" class="btn btn-primary">{{__('all.signin')}}</button>

</form>
<div class="w-100 color2"></div>

</div>

    </section>

@endsection
