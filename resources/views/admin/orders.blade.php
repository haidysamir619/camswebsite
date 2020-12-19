@extends('layout.all_admin')
@section('title', 'orders')
@section('content')
      <section id="reviews-table" class="my-5">
         <div class="container  text-center">
         <h2 class="h1">Manage Reviews</h2>
         <div class="dashboard">
            @if(!empty($session))
  <div class="text-white bg-danger"> {{ $session }}</div>
@else
            <div class="row reviews-block mb-5">
               <div class="table-responsive">
                  <table class="main table table-bordered text-center">

                     <tr>
                        <td>#ID</td>
                        <td>user name</td>
                        <td>phone</td>
                        <td>address</td>
                        <td>country</td>
                        <td>state</td>
                        <td>city</td>
                        <td>total price</td>
                        <td>quantity</td>
                        <td>product</td>
                        <td>product price</td>

                     </tr>
                     @php
                     $name='name_'.app()->getLocale();

                    @endphp
                     @foreach ($receipts as $receipt)

                     <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$receipt->user->$name}}</td>
                        <td>{{$receipt->user->phone}}</td>
                        <td>{{$receipt->address}}</td>
                        <td>{{$receipt->country}}</td>
                        <td>{{$receipt->state}}</td>
                        <td>{{$receipt->city}}</td>
                        <td>{{$receipt->total_price}}</td>

                        <td>
                            <ul class="list-unstyled">
                                @foreach ($receipt->orders as $order)
                               <li>{{$order->quantity}}</li>
                               @endforeach
                           </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($receipt->orders as $order)
                               <li>{{$order->product->$name}}</li>
                               @endforeach
                           </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($receipt->orders as $order)
                               <li>{{$order->product->price}}</li>
                               @endforeach
                           </ul>
                        </td>

                     </tr>
                     @endforeach

                  </table>
               </div>
               @endif

            </div>
      </section>
      @endsection
