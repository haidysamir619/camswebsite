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
                <span class="show-product float-right"><i class="fa fa-eye fa-lg"onclick="location.href='{{route('product_show',$favourite->product->id)}}';"></i></span>
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
                @php
                $rate=$favourite->product->rate;
             @endphp
             @for($i= 1;$i<=$rate;$i++)
             @if($i>5)
                 @break(0);
             @endif
             <i class="fa fa-star checked"></i>
         @endfor
         {{-- //loop to get the star the user lost --}}
         @if($rate==0)
             @for($i= 1;$i<=5;$i++)
             <i class="fa fa-star"></i>
         @endfor
             @elseif(5-$rate > 0)
                 @for($i= 1;$i<=5-$rate;$i++)
                     <i class="fa fa-star"></i>
                 @endfor

         @endif

                    <span class="d-block price">{{$favourite->product->price}}</span>
                    <button type="button" name="button" class="Add-To-Cart" onclick="location.href='{{route('add_to_cart',$favourite->product->id)}}';">{{__('all.add_to_cart')}}</button>
                    <button type="button" name="button" class="delete-button" onclick="location.href='{{route('delete_from_favourite',$favourite->product->id)}}';">{{__('all.delete')}}</button>

                </div>
              </div>
           </div>
           @endforeach


        </div>
      </section>
   @endsection
