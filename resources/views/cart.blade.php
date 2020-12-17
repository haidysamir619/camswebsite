@extends('layout.all_user')
@section('title', 'cart')
@section('content')
    <section id="cart-page">
         <div class="container">
            @php
            $description='description_'.app()->getLocale();
            $name='name_'.app()->getLocale();

           @endphp

            @if (Session::has('deleted'))
            <div class="alert alert-success fade show mt-3">
                {{ Session::get('deleted') }}
            </div>
            @endif
            @if (Session::has('added'))
            <div class="alert alert-success fade show mt-3">
                {{ Session::get('added') }}
            </div>
            @endif
            <div class="row my-5">
               <div class="col">
                  <h2 class="mb-4">{{__('all.shopping_cart')}}({{$carts->count()}})</h2>
                  @foreach ($carts as $cart)
                  <div class="cart-product mb-3 p-3">
                    <div class="product-img float-left mr-3">
                       <img src="{{asset($cart->product->image)}}" alt="" width="95" height="95">
                    </div>
                    <div class="product-details" style="overflow:hidden">
                       <h3 class="product-name">{{$cart->product->$name}}</h3>
                       <span class="d-block product-rate">{{$cart->product->rate}}</span>
                       <div class="product-quality-price">
                          <p class="float-left"><span class="product-total-price">{{$cart->product->price}}</span></p>
                          <div class="quantity float-right">
                             <span class="">{{__('all.quantity')}}</span>
                          <form action="{{route('update_cart')}}" id="quantity_form">
                                 @csrf
                          <input type="hidden" name="cartid" value="{{$cart->id}}">
                                <select id="quantity_change" name="quantity">
                                @for ($i=1;$i<=$cart->product->quantity;$i++)
                                <option
                                @if ($i==$cart->quantity)
                                 {{'selected'}}
                                @endif



                                value="{{$i}}" >{{$i}}</option>
                                @endfor

                                 </select>
                                 <input type="submit" value="edit" class="bg-dark text-white border-0">
                             </form>

                          </div>
                       </div>
                       <div class="clearfix">
                       </div>
                       <hr>
                       <button type="button" name="button" class="delete-button" onclick="location.href='{{route('delete_from_cart',$cart->product->id)}}';">{{__('all.delete')}}</button>
                       <button type="button" name="button" class="Add-To-Wishlist" onclick="location.href='{{route('add_to_favourite',$cart->product->id)}}';">{{__('all.add_to_favourite')}}</button>

                    </div>
                 </div>
                  @endforeach


               </div>
               <div class="col">
                  <div class="bill">
                     <div class="order-summary">
                        <span class="d-block">order summary</span>
                     </div>
                     <div class="your-product px-3">
                        <span class="mt-3">Products ({{$productcount}})</span>
                     <span class="float-right">{{$totalprice}}</span>
                        <hr>
                        <div class="clearfix"></div>
                        <span>Shipping &handling</span>
                        <span class="float-right">free</span>
                        <hr>
                        <img src="images/card.png" alt="" class="d-block mx-auto">
                     </div>
                    <button type="button" name="button" class="checkout-button mx-auto d-block" onclick="location.href='{{route('process_to_checkout')}}'">processed to checkout</button>
                  </div>
                  <p>Questions?
                     <a href="index.html#contact_us">Contact Customer Service</a>
                  </p>
               </div>
            </div>
         </div>
      </section>
   @endsection
