@extends('layout.all_user')
@section('title', 'product')

@section('content')
    <section id="product-section">

         <div class="container">
            @if (Session::has('added'))
            <div class="alert alert-success fade show mt-3">
                {{ Session::get('added') }}

            </div>
            @endif
            @if (Session::has('liked'))
            <div class="alert alert-success fade show mt-3">
                {{ Session::get('liked') }}

            </div>
            @endif
            @php
            $description='description_'.app()->getLocale();
            $name='name_'.app()->getLocale();

           @endphp

            <div class="item my-5"  >
               <div class="row justify-content-center">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                     <div  class="item-image w-100 mx-auto">
                        <img src="{{asset($product->image)}}" class="d-block mx-auto  " width="300" height="300"alt="">
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                  <h2>{{$product->$name}}</h2>
                  @php
                     $rate=$product->rate;
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


                     {{-- <span class="d-block reviews">{{$product->feedback->rate}}reviews</span> --}}
                     <span class="d-block price">{{$product->price}}</span>
                     <span class="d-block">Eligible for FREE Shipping on orders over 350.00 EGP </span>
                     <h3>{{__('all.description')}}</h3>
                     <p>{{$product->$description}} </p>
                     <div class="text-center">
                        <button type="button" name="button" class="Add-To-Cart" onclick="location.href='{{route('add_to_cart',$product->id)}}';">{{__('all.add_to_cart')}}</button>
                        <button type="button" name="button" class="Add-To-Wishlist" onclick="location.href='{{route('add_to_favourite',$product->id)}}';">{{__('all.add_to_favourite')}}</button>
                     </div>
                  </div>
               </div>
         </div>

      </section>


      <section id="reviews" class="my-3">
         <div class="container">
            <h3 class="text-center">{{__('all.customer_reviews')}}</h3>
            <div class="review-sort">
               <div class="float-left">
                  <span class="reviews-count">{{__('all.reviews')}} (<span>{{$reviews->count()}}</span>)</span>
               </div>
            <form action="{{route('sort_review')}}" method="POST">
                @csrf
               <div class="sort text-right">
                  <span>sortby:</span>
                  <select class="" name="selete_review">
                     <option value="recent">most recent</option>
                     <option value="desc">high rating first</option>
                     <option value="asc">low rating first</option>
                  </select>
                <input type="hidden" name="productid" value="{{$product->id}}">
                  <input type="submit">
               </div>
            </div>
        </form>
            <div class="clearfix">
            </div>
            <div class="reviews-block">
                @foreach ($reviews as $review)
               <div class="review-block">
                @php
                $rate=$review->rate;
             @endphp
             @for($i= 1;$i<=$rate;$i++)
             @if($i>5)
                 @break(0);
             @endif
             <i class="fa fa-star checked"></i>
         @endfor
         {{-- //loop to get the star the user lost --}}
             @if(5-$rate > 0)
                 @for($i= 1;$i<=5-$rate;$i++)
                     <i class="fa fa-star"></i>
                 @endfor
             @endif
                  <p>by <span>{{$review->user->name_en}}</span> on <span>{{$review->created_at}}</span></p>
                <p class="review">{{$review->comment}}</p>
                @if($review->is_liked_by_user())
                <button type="button" name="button"  onclick="location.href='{{route('review_dislike',$review->id)}}';"><i class="fas fa-thumbs-down"></i> not helpful</button>

                @else
                <button type="button" name="button" onclick="location.href='{{route('review_like',$review->id)}}';"><i class="fas fa-thumbs-up" ></i> helpful</button>

                @endif
                  <hr>
                  @endforeach

                <form action="{{route('leave_comment')}}" method="POST" class="leavecomment">
                    @csrf
                    <h2>leave comment</h2>
                    <textarea name="comment"  cols="30" rows="10" style="width:100%" required></textarea>
                    <div class="rating">
                        <label>
                          <input type="radio" name="stars" value="1" />
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="stars" value="2" />
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="stars" value="3" />
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="stars" value="4" />
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="stars" value="5" />
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                    </div>
                    <input type="hidden" name="productid" value="{{$product->id}}">
                    <input type="submit" class="send_comment">

                </form>
               </div>

            </div>

         </div>
      </section>
      @endsection

