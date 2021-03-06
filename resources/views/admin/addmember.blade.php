@extends('layout.all_admin')
@section('title', 'add member')

@section('content')
      <section id="add-member" class="my-5 ajax-block">
        <div class="container" id="ajax-add-container">
            <h2 class="text-center h1">Add New Member</h2>
            <div class="add-block">
             <form id="add"
             action="{{route('add_member')}}" method="post" enctype="multipart/form-data">
             {{-- <form action="{{route('register')}}" method="post"> --}}
                @csrf
                <div class="form-row my-3">
                    <div class="col">
                       <label for="exampleInputEmail1">{{__('all.name_ar')}}</label>

                    <input  value="{{ old('name_ar') }}" class="@error('name') is-invalid @enderror form-control"  type="text" name="name_ar" placeholder="your name in arabic" title="your name must be in Arabic character only" autocomplete="on" autofocus   >
                    @error('name_ar')
                    <span class="bg-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                </div>
                    <div class="form-row my-3">

                    <div class="col">
                        <label for="exampleInputEmail1">{{__('all.name_en')}}</label>

                       <input type="text"   value="{{ old('name_en') }}" name="name_en" class="form-control" placeholder="your name in english"  title="your name must be in English character only" autocomplete="on" >
                       @error('name_en')
                       <span class="bg-danger" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                    </div>

                 </div>

         <div class="form-group mb-3">
                    <label for="exampleInputEmail1">{{__('all.email')}}</label>
                    <input type="email"  value="{{ old('email') }}" name="email" title="your email must be like that name@domain-name.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@domain-name.com"  pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$"required >
                     @error('email')
                        <span class="bg-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                 </div>
                 <fieldset class="form-group mb-3">
                    <div class="row">
                       <legend class="col-form-label col-sm-1 pt-0">Gender</legend>
                       <div class="col-sm-11">
                          <div class="form-check-inline">
                             <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked >
                             <label class="form-check-label" for="gridRadios1">
                             male
                             </label>
                          </div>
                          <div class="form-check-inline">
                             <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
                             <label class="form-check-label" for="gridRadios2">
                             female
                             </label>
                          </div>
                       </div>
                       @error('gender')
                        <span class="bg-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                 </fieldset>
                 <div class="form-group ">
                    <div class="row ">
                      <select name="country" class="form-control m-2 col-4" id="countryId">
                        <option value="">Select Country</option>
                      </select>
                      <select name="state" class="form-control m-2 col-4" id="stateId">
                        <option value="">Select State</option>
                      </select>

                      <select name="city" class="form-control m-2 col-3" id="cityId">
                        <option value="">Select City</option>
                      </select>

                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label>Your Address</label>
                    <input type="text"  value="{{ old('address') }}" class="form-control" name="address" placeholder="Country, State, City, Street" pattern="^([\u0621-\u064A0-9\-, ]{3,})|([a-zA-Z0-9\-, ]{3,})+$" title="your address must be in English or Arabic characters only and at least 3 characters" autocomplete="on" >
                    @error('address')
                        <span class="bg-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                 </div>
                 <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">type</label>
                    <div class="col-sm-12">
                       <select class="form-control" name="type" >
                          <option value="">--</option>
                          <option value="0">user</option>
                          <option value="1">admin</option>
                       </select>

                   </div>

                 </div>
                 <div class="form-group mb-3">
                    <label>Your Phone</label>
                    <input type="text"  value="{{ old('phone') }}" class="form-control" name="phone" placeholder="+201..." pattern="^\+?\d{10,}$" title="your phone must be at least 10 digits" autocomplete="on" >
                    @error('phone')
                        <span class="bg-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                 </div>
                 <div class="form-group mb-3">
                    <label for="exampleInputPassword1">{{__('all.password')}}</label>
                    <input type="password"  name="password" class="form-control" id="exampleInputPassword1" title="your password must be 8 caharacters at least" placeholder="at least 8 characters" pattern="^.{8,}$" required >
                    @error('password')
                        <span class="bg-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                 </div>
                 <div class="form-group mb-3">
                    <label for="exampleInputPassword1">{{__('all.re-enter_password')}}</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1"title="confirm-password must match the password" placeholder="re-enter your password" pattern="^.{8,}$" required>
                    @error('confirm-password')
                        <span class="bg-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                 </div>
                 {{-- <div class="form-group form-check check-shape ">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="agree" required >
                    <label class="form-check-label" for="exampleCheck1">I agree all terms </label>
                    @error('agree')
                        <span class="bg-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                 </div> --}}
                 <input type="submit"  value="save changes" class="mx-auto d-block">

              </form>
            </div>
         </div>
      </section>
@endsection
