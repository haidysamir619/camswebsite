@extends('layout.all_admin')
@section('title', 'admin area')

@section('content')
      <section id="admin-panel" class="my-5">
         <div class="container  text-center">
            <h2 class="h1">DASHBOARD</h2>
            <div class="dashboard">
               <div class="row dash-blocks mb-5">
                  <div class="block-container col-xs-12 col-sm-12 col-md-6 col-lg-3  ">
                     <div class="block block-antiquewhite text-center">
                        <i class="fa fa-users fa-4x"></i>
                        <div class="block-content">
                           <h3>{{__('all.members')}}</h3>
                           <span>{{$members->count()}}</span>
                        </div>
                     </div>
                  </div>
                  <div class="block-container  col-xs-12 col-sm-12 col-md-6 col-lg-3  ">
                     <div class="block block-antiquewhite text-center">
                        <i class="fa fa-comments fa-4x"></i>
                        <div class="block-content">
                            <h3>{{__('all.brands')}}</h3>
                            <span>{{$brands->count()}}</span>
                        </div>
                     </div>
                  </div>
                  <div class="block-container col-xs-12 col-sm-12 col-md-6 col-lg-3  ">
                     <div class="block text-center">
                        <i class="fa fa-list-alt fa-4x"></i>
                        <div class="block-content">
                           <h3>{{__('all.categories')}}</h3>
                           <span>{{$categories->count()}}</span>
                        </div>
                     </div>
                  </div>
                  <div class="block-container col-xs-12 col-sm-12 col-md-6 col-lg-3  ">
                     <div class="block text-center">
                        <i class="fa fa-tag fa-4x"></i>
                        <div class="block-content">
                           <h3>{{__('all.products')}}</h3>
                           <span>{{$products->count()}}</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="last-section">
                  <div class="row" >
                     <div class="col-md-6">
                        <div class="card card-default">
                           <div class="card-header   text-center ">
                              <span class="toggle2_info">
                              <i class="fa fa-plus float-right fa-2x "></i>
                              </span>
                              <i class="fa fa-users "></i> latest members
                           </div>
                           <div class="card-body user ">
                            <ul class="list-unstyled lastest-users ">
                                  @foreach ($members as $member)
                                 <li class="text-left" style="overflow: hidden">
                                 <h5 class="float-left">{{$member->name_ar}}</h5>
                                    <a href="{{route('delete_member',$member->id)}}" class="d-inline-block control-button delete float-right mb-md-2 mg-0"><i class="fas fa-trash-alt"></i> delete</a>
                                    <a href="{{route('edit_member',$member->id)}}" class="d-inline-block control-button edit float-right"><i class="fa fa-edit"></i> edit</a>
                                 </li>
                                 @endforeach

                              </ul>
                           </div>
                    </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card card-default" >
                           <div class="card-header   text-center ">
                              <span class="toggle2_info">
                              <i class="fa fa-plus float-right fa-2x "></i>
                              </span>
                              <i class="fa fa-list"></i> latest categories
                           </div>
                           <div class="card-body user">
                            <ul class="list-unstyled lastest-users " id="" >
                                @foreach ($categories as $category)
                                <li class="text-left" style="overflow: hidden">
                                <h5 class="float-left">{{$category->name_ar}}</h5>
                                    <a href="{{route('delete_category',$category->id)}}" class="d-inline-block control-button bg-danger float-right mb-md-2 mg-0"><i class="fas fa-trash-alt"></i> delete</a>
                                    <a href="{{route('edit_category',$category->id)}}" class="d-inline-block control-button bg-success float-right"><i class="fa fa-edit"></i> edit</a>
                                 </li>
                                 <br>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card card-default">
                           <div class="card-header   text-center ">
                              <span class="toggle2_info">
                              <i class="fa fa-plus float-right fa-2x "></i>
                              </span>
                              <i class="fa fa-tag"></i> latest products
                           </div>
                           <div class="card-body user">
                            <ul class="list-unstyled lastest-users " >
                                @foreach ($products as $product)

                                 <li class="text-left" style="overflow: hidden">
                                    <h5 class="float-left">{{$product->name_ar}}</h5>
                                    <a href="{{route('delete_product',$product->id)}}" class="d-inline-block control-button bg-danger float-right mb-md-2 mg-0"><i class="fas fa-trash-alt"></i> delete</a>
                                    <a href="{{route('edit_product',$product->id)}}" class="d-inline-block control-button bg-success float-right"><i class="fa fa-edit"></i> edit</a>
                                 </li>
                                 @endforeach

                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card card-default">
                            <div id="card-all">

                           <div class="card-header   text-center ">
                              <span class="toggle2_info">
                              <i class="fa fa-plus float-right fa-2x "></i>
                              </span>
                              <i class="fa fa-comments"></i> latest brands
                           </div>
                           <div class="card-body user">
                            <ul class="list-unstyled lastest-users " id="">
                                @foreach ($brands as $brand)

                               <li class="text-left" style="overflow: hidden">
                                  <h5 class="float-left">{{$brand->name_ar}}</h5>
                                  <a href="{{route('delete_brands',$brand->id)}}" class="d-inline-block control-button bg-danger float-right mb-md-2 mg-0"><i class="fas fa-trash-alt"></i> delete</a>
                                  <a href="{{route('edit_brands',$brand->id)}}" class="d-inline-block control-button  bg-success float-right"><i class="fa fa-edit"></i> edit</a>
                               </li>
                               @endforeach
                           </div>
                        </div>
                    </div>

                     </div>

                  </div>
               </div>
            </div>
      </section>
@endsection
