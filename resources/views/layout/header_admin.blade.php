<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>@yield('title')</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- <meta http-equiv="refresh" content="30"> -->
      <link rel="icon"  href="{{ asset('images/Asset 2.png') }}">
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('fonts/fonts/css/all.css') }}" rel="stylesheet">
      <link href="{{asset('css/admin.css')}}" rel="stylesheet">
      {{-- @yield('css') --}}
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light">
         <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('images/Asset 2.png') }}" width="90" height="90"></a>
            <button class="navbar-toggler" type="button"
               data-toggle="collapse"
               data-target="#navbarResponsive"
               aria-controls="navbarResponsive"
               aria-expanded="false"
               aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"
               id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    @if (url()->current()==route('adminarea'))
                    <a class="nav-link" href="#">{{__('all.admin_area')}}</a>
                    @else
                    <a class="nav-link" href="{{route('adminarea')}}">{{__('all.admin_area')}}
                        <span class="sr-only">(current)</span>
                        </a>
                     @endif

                  </li>
                  <li class="nav-item">
                    @if (url()->current()==route('get_members'))
                    <a class="nav-link" href="#">{{__('all.members')}}</a>
                    @else
                    <a class="nav-link" href="{{route('get_members')}}">{{__('all.members')}}</a>
                    @endif
                  </li>
                  <li class="nav-item">
                    @if (url()->current()==route('get_categories'))
                    <a class="nav-link" href="#">{{__('all.categories')}}</a>
                    @else
                    <a class="nav-link" href="{{route('get_categories')}}">{{__('all.categories')}}</a>
                    @endif
                  </li>
                  <li class="nav-item">
                    @if (url()->current()==route('get_brands'))
                    <a class="nav-link" href="#">{{__('all.brands')}}</a>
                    @else
                    <a class="nav-link" href="{{route('get_brands')}}">{{__('all.brands')}}</a>
                    @endif
                 </li>
                  <li class="nav-item">
                    @if (url()->current()==route('get_products'))
                     <a class="nav-link" href="#">{{__('all.products')}}</a>
                     @else
                     <a class="nav-link" href="{{route('get_products')}}">{{__('all.products')}}</a>
                     @endif
                  </li>
                  <li class="nav-item">
                    @if (url()->current()==route('get_reviews'))
                    <a class="nav-link" href="#">{{__('all.reviews')}}</a>
                    @else
                    <a class="nav-link" href="{{route('get_reviews')}}">{{__('all.reviews')}}</a>
                    @endif
                  </li>
                  <li class="nav-item">
                    @if (url()->current()==route('get_orders'))
                    <a class="nav-link" href="#">{{__('all.receipts')}}</a>
                    @else
                    <a class="nav-link" href="{{route('get_orders')}}">{{__('all.receipts')}}</a>
                    @endif
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->{'name_'.app()->getLocale()} }}
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (url()->current()==route('profile'))
                        <a class="dropdown-item" href="#">{{__('all.profile')}}</a>
                        @else
                        <a class="dropdown-item" href="{{route('profile')}}">{{__('all.profile')}}</a>
                        @endif
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('all.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                     <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('index')}}">{{__('all.visit_shop')}}</a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
