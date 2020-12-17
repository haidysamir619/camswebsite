<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>@yield('title')</title>
      {{-- <title>{{$title}}</title> --}}

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- <meta http-equiv="refresh" content="30"> -->
      <link rel="icon"  href="{{ asset('images/Asset 2.png') }}">
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('fonts/fonts/css/all.css') }}" rel="stylesheet">
      <link href="{{asset('css/main.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
   <body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-sm">
           <div class="row">
              <div class="col-2">
                @if (url()->current()==route('index'))
                 <a class="navbar-brand" href="#"><img src="{{asset('images/Asset 2.png')}}" width="120" height="120"></a>
                @else
                <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('images/Asset 2.png')}}" width="120" height="120"></a>
                @endif
                </div>
           </div>
           <form action="{{route('search')}}" method="post" class="input-wrap mr-sm-2 d-block d-lg-none  d-xl-none">
            @csrf
              <input type="search"  name="search">
              {{-- <input type="submit"   value="search"> --}}
           </form>
           @if (url()->current()==route('cart'))

           <a class=" cart2 d-block d-lg-none  d-xl-none " href="#"><i class="fas fa-shopping-cart"></i></a>
            @else
            <a class=" cart2 d-block d-lg-none  d-xl-none " href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i></a>
           @endif
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class="col">
              <div class="upper-row">
                 <div class="row mb-lg-2">
                    <div class="collapse navbar-collapse" id="navbarNav">
                       <ul class="navbar-nav">
                          <div class="input-wrap mr-sm-2 d-none d-lg-block d-xl-none d-none d-xl-block">

                            <form action="{{route('search')}}" method="post" class="input-wrap mr-sm-2">
                                @csrf
                                  <input type="search"  name="search">
                                  {{-- <input type="submit"   value="search"> --}}
                               </form>
                          </div>
                          @if(!Auth::check())
                          @if (url()->current()==route('login'))

                          <span class="d-none d-lg-block d-xl-none d-none d-xl-block" onclick="location.href='#'">{{__('all.signin')}}</span>
                           @else
                           <span class="d-none d-lg-block d-xl-none d-none d-xl-block" onclick="location.href='{{route('login')}}'">{{__('all.signin')}}</span>

                           @endif
                          @endif
                          @if(app()->getLocale() =='en')
                          <span class="d-none d-lg-block d-xl-none d-none d-xl-block" onclick="location.href='{{route('language','ar')}}'">Ar</span>
                          @else
                          <span class="d-none d-lg-block d-xl-none d-none d-xl-block" onclick="location.href='{{route('language','en')}}'">En</span>
                          @endif
                          @if (url()->current()==route('favouritelist'))

                          <span class="d-none d-lg-block d-xl-none d-none d-xl-block" onclick="location.href='#'"><i class="fab fa-gratipay"></i>
                          </span>
                          @else
                          <span class="d-none d-lg-block d-xl-none d-none d-xl-block" onclick="location.href='{{route('favouritelist')}}'"><i class="fab fa-gratipay"></i>
                          </span>
                          @endif
                          @if(!Auth::check())
                          @if (url()->current()==route('register'))

                          <button type="button" name="button" class="d-none d-lg-block d-xl-none d-none d-xl-block" onclick="location.href='#'">{{__('all.create_new_account')}}</button>
                            @else
                            <button type="button" name="button" class="d-none d-lg-block d-xl-none d-none d-xl-block" onclick="location.href='{{route('register')}}'">{{__('all.create_new_account')}}</button>

                            @endif
                          @else
                          <li class="nav-item dropdown d-none d-lg-block d-xl-none d-none d-xl-block">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->{'name_'.app()->getLocale()} }}
                            </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                          @endif
                        </ul>
                    </div>
                 </div>
                 <div class="clearfix"> </div>
                 <div class="lower-row">
                    <div class="row">
                       <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav px-3">
                             <li class="nav-item">
                                @if (url()->current()==route('index'))

                                <a class="nav-link" href="#">{{__('all.home')}}</a>
                                @else
                                <a class="nav-link" href="{{route('index')}}">{{__('all.home')}}</a>
                                @endif
                             </li>

                             <li class="nav-item">
                                @if (url()->current()==route('index'))

                             <a class="nav-link" href="#about_us">{{__('all.about')}}</a>
                             @else
                             <a class="nav-link" href="{{route('index')}}#about_us">{{__('all.about')}}</a>

                             @endif
                             </li>

                             @if(Auth::check() && Auth::user()->type>0)
                             <li class="nav-item">

                             <a class="nav-link" href="{{route('adminarea')}}">{{__('all.admin')}}</a>
                             </li>
                             @endif
                             <li class="nav-item">
                                @if (url()->current()==route('index'))

                                <a class="nav-link" href="#NewArrivals_BestSellers">{{__('all.new_sale')}}</a>
                                @else
                             <a class="nav-link" href="{{route('index')}}#NewArrivals_BestSellers">{{__('all.new_sale')}}</a>

                                @endif
                            </li>
                             <li class="nav-item">
                                @if (url()->current()==route('index'))

                                <a class="nav-link" href="#category">{{__('all.products')}}</a>
                                @else
                                <a class="nav-link" href="{{route('index')}}#category">{{__('all.products')}}</a>

                                @endif
                             </li>
                             <li class="nav-item">
                                @if (url()->current()==route('index'))

                                <a class="nav-link" href="#contact_us">{{__('all.contact_us')}}</a>
                                @else
                                <a class="nav-link" href="{{route('index')}}#contact_us">{{__('all.contact_us')}}</a>
                                @endif


                            </li>
                             <li class="nav-item d-none d-lg-block d-xl-none d-none d-xl-block cart">
                                @if (url()->current()==route('cart'))

                                <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                                 @else
                                 <a class="nav-link" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i></a>

                                 @endif
                            </li>
                             @if(!Auth::check())

                             <li class="nav-item d-block d-lg-none  d-xl-none ">
                                @if (url()->current()==route('login'))
                                <a class="nav-link " href="#">{{__('all.signin')}}</a>
                                @else

                                <a class="nav-link " href="{{route('login')}}">{{__('all.signin')}}</a>
                                @endif
                             </li>
                             @endif
                             <li class="nav-item d-block d-lg-none  d-xl-none ">
                                @if (url()->current()==route('favouritelist'))

                                <a class="nav-link " href="#">{{__('all.favouritelist')}}</a>
                                @else
                                <a class="nav-link " href="{{route('favouritelist')}}">{{__('all.favouritelist')}}</a>

                                @endif
                             </li>
                             <li class="nav-item d-block d-lg-none  d-xl-none ">
                                @if(app()->getLocale() =='en')

                                <a class="nav-link" href="{{route('language','ar')}}">en</a>
                                @else
                                <a class="nav-link" href="{{route('language','en')}}">ar</a>
                                @endif

                             </li>



                             @if(!Auth::check())

                             <li class="nav-item d-block d-lg-none  d-xl-none my-3">
                                <button type="button" name="button" onclick="location.href='{{route('register')}}';">{{__('all.create_new_account')}}</button>
                             </li>
                             @else
                             <li class="nav-item dropdown d-block d-lg-none  d-xl-none">
                                 <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{-- @php
                                    $lang='name_'.app()->getLocale();
                                    @endphp
                                    {{ Auth::user()->$lang }} --}}

                                    {{ Auth::user()->{'name_'.app()->getLocale()} }}
                                 </a>

                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form>
                                 </div>
                             </li>
                             @endif
                            </ul>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </nav>
{{-- {{app()->getLocale()}} --}}
