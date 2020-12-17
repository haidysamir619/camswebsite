@extends('layout.all_admin')
@if(url()->current()==route('get_categories'))
@section('title', 'categories')
@elseif(url()->current()==route('get_brands'))
@section('title', 'brands')
@endif
@section('content')

        <section id="categories-table" class="my-5 ajax-table">
            <div class="container-fluid  text-center" id="ajax-container">
                <h2 class="h1">Manage {{$type}}</h2>
         <div class="dashboard">
            <div class="row categories-block mb-5">
               <div class="table-responsive">
                  <table class="main table table-bordered text-center">
                     <tr>
                        <td>#ID</td>
                        <td>{{$type}} Name Ar</td>
                        <td>{{$type}} Name En</td>
                        <td>Image</td>
                        <td>Control</td>
                     </tr>
                     @foreach ($brands as $brand)
                     <tr>
                        <td>{{$loop->iteration}}</td>{{--1-2-3-4-....--}}
                        <td>{{$brand->name_ar}}</td>
                        <td>{{$brand->name_en}}</td>
                        <td><img src="{{asset($brand->image)}}" width="95" height="95"></td>
                        <td>
                            @if (url()->current()==route('get_categories'))
                            <a href="{{route('delete_category',$brand->id)}}" class="d-inline-block control-button delete mb-2 m-lg-0"><i class="fas fa-trash-alt"></i> delete</a>

                              @elseif (url()->current()==route('get_brands'))

                              <a href="{{route('delete_brands',$brand->id)}}" class="d-inline-block control-button delete mb-2 m-lg-0"><i class="fas fa-trash-alt"></i> delete</a>

                            @endif
                            @if (url()->current()==route('get_categories'))
                            <a href="{{route('edit_category',$brand->id)}}" class="d-inline-block control-button edit "><i class="fa fa-edit"></i> edit</a>

                              @elseif (url()->current()==route('get_brands'))

                              <a href="{{route('edit_brands',$brand->id)}}" class="d-inline-block control-button edit mb-2 m-lg-0"><i class="fas fa-trash-alt"></i> edit</a>

                            @endif

                        </td>
                     </tr>
                     @endforeach

                  </table>
                  @if (url()->current()==route('get_categories'))
                  <a href="{{route('add_category_page')}}" class="btn btn-primary  mt-2 float-left" href="addcategories.html">
                    <i class="fa fa-plus mr-2"></i>Add New {{$type}}
                    {{-- @if ($type=="brands")
                        {{Str::substr($type,0,-1)}}
                        @else
                        {{Str::substr($type,0,-3).'y'}}
                        @endif --}}

                    </a>
                    @elseif (url()->current()==route('get_brands'))

                    <a href="{{route('add_brands_page')}}" class="btn btn-primary  mt-2 float-left" href="addcategories.html">
                        <i class="fa fa-plus mr-2"></i>Add New {{$type}}
                        {{-- @if ($type=="brands")
                        {{Str::substr($type,0,-1)}}
                        @else
                        {{Str::substr($type,0,-3).'y'}}
                        @endif --}}


                        </a>
                  @endif

               </div>
            </div>
        </div>
      </section>
      @endsection

