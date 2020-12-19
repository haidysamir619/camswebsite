@extends('layout.all_user')
@section('title', 'home')

@section('content')
      <section class="slider">
        @php
        $description='description_'.app()->getLocale();
        $name='name_'.app()->getLocale();

    @endphp

         <div class="w-100 color"></div>
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="container">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-6 text-center my-auto ">
                           <h1>Nikon Z6</h1>
                           <h2>A brilliant full-frame all-rounder</h2>
                           <button type="button" name="button" class="d-none d-lg-block d-xl-block d-md-block mx-auto">shop now</button>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 my-auto mx-auto">
                           <img class="d-block mx-auto" src="images/c.png" alt="First slide">
                           <span class="d-block text-center">before $1,767,95</span>
                           <span class="text-center d-block">$1,500,95</span>
                           <button type="button" name="button" class="d-block d-lg-none  d-xl-none d-md-none mx-auto">shop now</button>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-6 text-center my-auto ">
                           <h1>Fujifilm X-T4</h1>
                           <h2>The finest APS-C all-rounder you can buy</h2>
                           <button type="button" name="button" class="d-none d-lg-block d-xl-block d-md-block mx-auto">shop now</button>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 my-auto mx-auto">
                           <img class="d-block mx-auto" src="images/Fujifilm.png" alt="First slide">
                           <span class="d-block text-center">before $1,699.00</span>
                           <span class="text-center d-block">$1,450,00</span>
                           <button type="button" name="button" class="d-block d-lg-none  d-xl-none d-md-none mx-auto">shop now</button>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-6 text-center my-auto ">
                           <h1>canonEOS-RS.3</h1>
                           <h2>A superb camera with best-in-class features</h2>
                           <button type="button" name="button" class="d-none d-lg-block d-xl-block d-md-block mx-auto">shop now</button>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 my-auto mx-auto">
                           <img class="d-block mx-auto" src="images/canonEOS-RS.3.png" alt="First slide">
                           <span class="d-block text-center">before $2,469,00</span>
                           <span class="text-center d-block">$2,200,00</span>
                           <button type="button" name="button" class="d-block d-lg-none  d-xl-none d-md-none mx-auto">shop now</button>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </section>
      </header>
      <section id="about_us">
         <h2 class="text-center title h1">{{__('all.about')}}</h2>
         <div class="container">
            <div class="blocks">
               <div class="row">
                  <div class="col-lg-4 col-xs-8 mb-5 mb-lg-0">
                     <div class="block">
                        <div class="block-upper">
                           <img src="images/mission.png" alt="" width="70" height="80">
                           <h2 class="d-inline-block text-capitalize">{{__('all.our_mission')}}</h2>
                        </div>
                        <div class="block-down">
                            <p>{{__('all.lorem')}}</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-xs-8 mb-5 mb-lg-0">
                     <div class="block">
                        <div class="block-upper">
                           <img src="images/strategy.png" alt="" width="70" height="80">
                           <h2 class="d-inline-block text-capitalize">{{__('all.our_strategy')}}</h2>
                        </div>
                        <div class="block-down">
                            <p>{{__('all.lorem')}}</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-xs-8">
                     <div class="block">
                        <div class="block-upper">
                           <img src="images/story.png" alt="" width="70" height="80">
                           <h2 class="d-inline-block text-capitalize">{{__('all.our_story')}}</h2>
                        </div>
                        <div class="block-down">
                            <p>{{__('all.lorem')}}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section id="subscribe_section">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-xs-12 text-center text-lg-left  ">
                  <h2>GET OUR LATEST OFFERS NEWS</h2>
                  <h3 class="text-xs-center">SUBSCRIBE NEWS LATER</h3>
               </div>
               <div class="col-lg-6 col-xs-12 subscribe my-auto ">
                  <form class="d-block mx-auto" action="index.html" method="post">
                     <input type="text" name="" value="" placeholder="your email here..">
                     <button type="submit" name="button">subscribe</button>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <section id="NewArrivals_BestSellers">
         <h2 class="h1 title text-center">{{__('all.new_sale')}}</h2>
         <div class="row justify-content-center">
          @foreach ($products as $product)


            <div class="col-md-9 mb-5" onclick="location.href='{{route('product_show',$product->id)}}';">
               <div class="item" >
                <span class="show-product float-right"><i class="fa fa-eye fa-lg"onclick="location.href='{{route('product_show',$product->id)}}';"></i></span>

                  <div class="case">
                    @php
                    $status=$product->status;
                  @endphp
                    @if($status=='new')
                    <p>{{__('all.new')}}</p>
                    @else
                        <p>{{__('all.sale')}}</p>
                    @endif
                  </div>
                  <div  class="item-image w-xs-100  w-md-40 float-xs-center float-md-left ">
                     <img src="{{asset($product->image)}}" class="d-block mx-auto" width="150" height="150"alt="">
                     <span class="d-block mr-0 text-center">{{$product->$name}}</span>
                  </div>
                  <div class="item-detail w-xs-100  w-md-60 pl-xs-0 pl-md-5">
                      <p>{{$product->$description}}</p>

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


                     <span class="d-block price">{{$product->price}}</span>
                  </div>
               </div>
            </div>
            @endforeach


         </div>
      </section>
      <section id="category">
         <h2 class="h1 title text-capitalize text-center">{{__('all.shop_by_category')}}</h2>
         <div class="row justify-content-center">
             @foreach ($categories as $category)
             <div class="  col-md-4  w-50 col-xs-12 mb-sm-3">
                <div class="category-block mb-3 mb-md-0 mx-auto" style="width:85%;" onclick="location.href='{{route('cat_product',$category->id)}}';">
                    <img src="{{asset($category->image)}}" alt="" class="w-100" height="180px">
                    <h4>{{$category->$name}}</h4>
                </div>
             </div>
             @endforeach

            {{-- <div class="col-md-3 mb-sm-3">
               <div class="category-block mb-3 mb-md-0">
                  <img src="images/instant-cameras.png" alt="" class="w-100" height="180px">
                  <h4>instant cameras</h4>
               </div>
            </div>
            <div class="col-md-3 mb-3">
               <div class="category-block mb-3 mb-md-0">
                  <img src="images/dslr image.png" alt="" class="w-100" height="180px">
                  <h4>DSLR  Cameras</h4>
               </div>
            </div>
         </div>
         <div class="row justify-content-center mt-md-3 ">
            <div class="col-md-3 mb-3 mb-md-0">
               <div class="category-block">
                  <img src="images/mirrorlessimage.png" alt="" class="w-100" height="180px">
                  <h4>Mirrorless Cameras</h4>
               </div>
            </div>
            <div class="col-md-3">
               <div class="category-block ">
                  <img src="images/surveillance cameras.png" alt="" class="w-100" height="180px">
                  <h4>Surveillance Cameras</h4>
               </div>
            </div>
         </div> --}}
      </section>
      <section id="contact_us">
         <h2 class="h1 title text-capitalize text-center">{{__('all.contact_us')}}</h2>
         <div class="container">
            <p class="text-center">we love to hear from you on our customer service,merchandise,website or any topics you want to share with us . your comments and suggestions will be appreciated.please complete the form </p>
         </div>
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 p-0">
                  <div class="contact-information">
                     <h3 class="mb-3 text-capitalize">contact information</h3>
                     <div class="contact-information-item mb-3">
                        <i class="fas fa-home fa-2x"></i>
                        <span>120street,city,country</span>
                     </div>
                     <div class="contact-information-item mb-3">
                        <i class="fas fa-phone-alt fa-2x"></i>
                        <span>012 3456 789</span>
                     </div>
                     <div class="contact-information-item mb-3">
                        <i class="fas fa-envelope fa-2x"></i>
                        <span>contact@company.com</span>
                     </div>
                     <div class="contact-information-item mb-3">
                        <i class="fas fa-clock fa-2x"></i>
                        <span>everyday 9:00-17:00</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 p-0">
                  <div class="contact-form">
                     <form>
                        <div class="form-group pt-3">
                           <label for="exampleInputEmail1">Your Name</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Your Email</label>
                           <input type="email" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                           <label for="exampleFormControlTextarea1">Your message</label>
                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
@endsection

