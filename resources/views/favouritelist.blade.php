@extends('layout.all_user')
@section('title', 'favouritelist')

@section('content')

      <section id="favouritelist-page" class="my-5">
          <div class="container">
        @if (Session::has('added'))
        <div class="alert alert-success fade show mt-3">
            {{ Session::get('added') }}
        </div>
        @endif
    </div>

    @php
    $description='description_'.app()->getLocale();
    $name='name_'.app()->getLocale();

   @endphp

        <h2 class="h1 title text-center">{{__('all.favouritelist')}}</h2>
        <div class="row justify-content-center">
            @foreach ($favourites as $favourite)

           <div class="col-md-9 mb-5 ">
              <div class="item">
                 <div class="case">
                     @php
                        $status=$favourite->product->status;
                      @endphp
                        @if($status=='new')
                        <p>{{__('all.new')}}</p>
                        @else
                            <p>{{__('all.sale')}}</p>
                        @endif
                 </div>
                 <div  class="item-image w-md-100  w-lg-40  float-xs-center float-lg-left">
                    <img src="{{asset($favourite->product->image)}}" class="d-block mx-auto" width="150" height="150"alt="">
                    <span class="d-block mr-0 text-center">{{$favourite->product->$name}}</span>
                 </div>
                 <div class="item-detail w-md-100  w-lg-60 pl-xs-0 pl-lg-5 text-center">
                <p>{{$favourite->product->$description}}</p>
                   <div class="rate">
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star"></span>
                       <span class="fa fa-star"></span>
                    </div>
                    <span class="d-block price">{{$favourite->product->price}}</span>
                    <button type="button" name="button" class="Add-To-Cart" onclick="location.href='{{route('add_to_cart',$favourite->product->id)}}';">{{__('all.add_to_cart')}}</button>
                </div>
              </div>
           </div>
           @endforeach


        </div>
      </section>
   @endsection
