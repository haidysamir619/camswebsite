@extends('layout.all_user')
@section('title', 'category product')

@section('content')

      <section id="category-page">
        @php
        $description='description_'.app()->getLocale();
        $name='name_'.app()->getLocale();

       @endphp
         <div class="container">
            @if (Session::has('added'))
            <div class="alert alert-success fade show mt-3">
                {{ Session::get('added') }}
            </div>
            @endif
            <div class="category-name-sort">
               <div class="name float-left">
                  <span class="category-title">{{$categoryname->$name}}</span>
                  <!-- <span class="item-found">(<span>2</span>)item found</span> -->
               </div>
               <div class="sort text-right">
                  <span>sortby:</span>
                  <select class="" name="">
                     <option value="">top rated</option>
                     <option value="">price:low to high</option>
                     <option value="">price:hight to low</option>
                  </select>
               </div>
            </div>
            <div class="clearfix">
            </div>
            <div class="row all-products">
                @foreach ($products as $product)

               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                  <div class="product mb-lg-0 mb-4">
                    <span class="show-product"><i class="fa fa-eye fa-lg"onclick="location.href='{{route('product_show',$product->id)}}';"></i></span>
                     <img src="{{asset($product->image)}}" width="220" height="200" alt="" class="mx-auto d-block">
                     <h6 class="text-center">{{$product->$name}}</h6>
                     <span class="d-block price float-left" >{{$product->price}}</span>

                     @if($product->rate=='1')
                     <div class="rate text-right">
                        <span class="fa fa-star checked"></span>
                       <span class="fa fa-star "></span>
                       <span class="fa fa-star"></span>
                       <span class="fa fa-star"></span>
                       <span class="fa fa-star"></span>
                    </div>
                    @elseif($product->rate=='2')

                    <div class="rate text-right">
                        <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star "></span>
                       <span class="fa fa-star"></span>
                       <span class="fa fa-star"></span>
                    </div>
                    @elseif($product->rate=='3')

                    <div class="rate text-right">
                        <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star"></span>
                       <span class="fa fa-star"></span>
                    </div>
                    @elseif($product->rate=='4')

                    <div class="rate text-right">
                        <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star"></span>
                    </div>
                    @elseif($product->rate=='5')

                    <div class="rate text-right">
                        <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                    </div>
                      @endif
                     <div class="clearfix">   </div>
                     <div class="text-center">
                        <button type="button" name="button" class="Add-To-Cart mb-md-2" onclick="location.href='{{route('add_to_cart',$product->id)}}';">{{__('all.add_to_cart')}}</button>
                        <button type="button" name="button" class="Add-To-Wishlist" onclick="location.href='{{route('add_to_favourite',$product->id)}}';">{{__('all.add_to_favourite')}}</button>
                    </div>
                  </div>
               </div>
               @endforeach


            </div>
         </div>
      </section>
@endsection
