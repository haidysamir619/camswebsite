@extends('layout.all_admin')
@section('title', 'products')

@section('content')
      <section id="products-table" class="my-5 ajax-table">
         <div class="container-fluid  text-center" id="ajax-container">
         <h2 class="h1">Manage Products</h2>
         <div class="dashboard">
            <div class="row products-block mb-5">
               <div class="table-responsive">
                  <table class="main table table-bordered text-center">

                     <tr>
                        <td>#ID</td>
                        <td>Product Name ar	</td>
                        <td>Product name en</td>
                        <td>Product price</td>
                        <td>Product image</td>
                        <td>Product status</td>
                        <td>Product rate</td>
                        <td>Product quantity</td>
                        <td>Product Category</td>
                        <td>Product brand</td>

                        <td>Control</td>
                        {{-- <td>Product date</td> --}}

                     </tr>
                     @foreach ($products as $product)

                     <tr>

                        <td>{{$loop->iteration}}</td>{{--1-2-3-4-....--}}
                        <td>{{$product->name_ar}}</td>
                        <td>{{$product->name_en}}</td>
                        <td>{{$product->price}}</td>
                        <td><img src="{{asset($product->image)}}" width="95" height="95"></td>
                        <td>{{$product->status}}</td>
                        <td>{{$product->rate}}</td>
                        <td>{{$product->quantity}}</td>

                        <td>{{$product->category->name_en}}</td>
                        <td>{{$product->brand->name_en}}</td>

                        <td>
                             <a href="{{route('delete_product',$product->id)}}" class="d-inline-block control-button delete mb-2 m-lg-0"><i class="fas fa-trash-alt"></i> delete</a>
                           <a href="{{route('edit_product',$product->id)}}" class="d-inline-block control-button edit "><i class="fa fa-edit"></i> edit</a>
                        </td>
                        {{-- <td>{{$product->created_at}}</td> --}}

                     </tr>
                     @endforeach
                  </table>
                  <a href="{{route('add_product_page')}}" class="btn btn-primary  mt-2 float-left" href="addcategories.html">
                    <i class="fa fa-plus mr-2"></i>Add New Product</a>
               </div>
            </div>
      </section>
@endsection
