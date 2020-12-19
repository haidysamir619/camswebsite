@extends('layout.all_user')
@section('title', 'checkout')

@section('content')
      <section id="checkout-page" class="my-5">
         <div class="container">
           <div class="row">
                   <div class="col-md-8">
                     <div class="container my-3">
                     <form action="{{route('continue_to_checkout')}}" method="POST">
                           @csrf
                         <div class="row">
                           <div class="col-md-6">
                             <h3 class="mt-2">Billing Address</h3>
                             <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                             <input type="text" id="fname" name="fullname" placeholder="John M. Doe">
                             @error('fullname')
                             <span class="bg-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                           @enderror
                             <label for="email"><i class="fa fa-envelope"></i> Email</label>
                             <input type="text" id="email" name="email" placeholder="john@example.com">
                             @error('email')
                             <span class="bg-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                           @enderror
                             <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                             <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                             @error('address')
                             <span class="bg-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                           @enderror
                           <label for="phone"><i class="fa fa-address-card-o"></i> phone</label>
                           <input type="text" id="phone" name="phone" placeholder="542 W. 15th Street">
                           @error('phone')
                           <span class="bg-danger" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                         @enderror
                             <label for="country"><i class="fa fa-institution"></i> country</label>
                             <input type="text" id="country" name="country" placeholder="New York">
                             @error('country')
                             <span class="bg-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                           @enderror
                           <label for="city"><i class="fa fa-institution"></i> City</label>
                           <input type="text" id="city" name="city" placeholder="New York">
                           @error('city')
                           <span class="bg-danger" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                         @enderror
                             <div class="row">
                               <div class="col-md-6">
                                 <label for="state">State</label>
                                 <input type="text" id="state" name="state" placeholder="NY">
                                 @error('state')
                                 <span class="bg-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                               @enderror
                                </div>
                               <div class="col-md-6">
                                 <label for="zip">Zip</label>
                                 <input type="text" id="zip" name="zip" placeholder="10001">
                                 @error('zip')
                                 <span class="bg-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                               @enderror
                               </div>
                             </div>
                           </div>

                           <div class="col-md-6">
                             <h3 class="mt-2">Payment</h3>
                             <label for="fname">Accepted Cards</label>
                             <div class="icon-container">
                               <i class="fa fa-cc-visa" style="color:navy;"></i>
                               <i class="fa fa-cc-amex" style="color:blue;"></i>
                               <i class="fa fa-cc-mastercard" style="color:red;"></i>
                               <i class="fa fa-cc-discover" style="color:orange;"></i>
                             </div>
                             <label for="cname">Name on Card</label>
                             <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                             @error('cardname')
                             <span class="bg-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                           @enderror
                             <label for="ccnum">Credit card number</label>
                             <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                             @error('cardnumber')
                             <span class="bg-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                           @enderror
                             <label for="expmonth">Exp Month</label>
                             <input type="text" id="expmonth" name="expmonth" placeholder="September">
                             @error('expmonth')
                             <span class="bg-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                           @enderror
                             <div class="row">
                               <div class="col-md-6">
                                 <label for="expyear">Exp Year</label>
                                 <input type="text" id="expyear" name="expyear" placeholder="2018">
                                 @error('expyear')
                                 <span class="bg-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                               @enderror
                                </div>
                               <div class="col-md-6">
                                 <label for="cvv">CVV</label>
                                 <input type="text" id="cvv" name="cvv" placeholder="352">
                                 @error('cvv')
                                 <span class="bg-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                               @enderror
                               </div>
                             </div>
                           </div>

                         </div>
                         <label>
                           <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                           @error('sameadr')
                           <span class="bg-danger" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                         @enderror
                        </label>
                         <input type="submit" value="Continue to checkout" class="btn">
                       </form>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="container my-3">
                        @php
                        $name='name_'.app()->getLocale();

                        @endphp
                       <h4 class="mt-2">Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{$productcount}}</b></span></h4>
                       @foreach ($products as $product)
                       <p><span>{{$product->product->$name}}</span> <span class="price">{{$product->product->price}}</span></p>

                       @endforeach
                       <hr>
                     <p>Total <span class="price" style="color:black"><b>{{$totalprice}}</b></span></p>
                     </div>
                   </div>
                 </div>
         </div>
      </section>
    @endsection
