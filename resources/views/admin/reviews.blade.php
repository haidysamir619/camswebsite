@extends('layout.all_admin')
@section('title', 'reviews')
@section('content')
      <section id="reviews-table" class="my-5 ajax-table">
         <div class="container  text-center" id="ajax-container">
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
                        <td>Review</td>
                        <td>rate</td>
                        <td>User</td>
                        <td>Product</td>
                     </tr>
                     @php
                     $name='name_'.app()->getLocale();

                    @endphp
                     @foreach ($reviews as $review)

                     <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$review->comment}}</td>
                        <td>{{$review->rate}}</td>
                        <td>{{$review->user->$name}}</td>
                        <td>{{$review->product->$name}}</td>

                     </tr>
                     @endforeach

                  </table>
               </div>
               @endif

            </div>
      </section>
      @endsection
