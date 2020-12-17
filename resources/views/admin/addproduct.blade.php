@extends('layout.all_admin')
@section('title', 'add product')

@section('content')
      <section id="add-product" class="my-5 ajax-block">
         <div class="container" id="ajax-add-container">
            <h2 class="text-center h1">Add New Product</h2>
            <div class="add-block">
               <form id="add" action="{{route('add_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="form-group row">
                     <div class="col-sm-10">
                        <input type="hidden" name="id" value="" class="form-control" >
                     </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product name(Arabic)</label>
                     <div class="col-sm-12">
                        <input type="text"name="name_ar" class="form-control"
                           placeholder="type the product name in arabic"  value="">
                           @error('name_ar')

                           <small  class="form-text text-danger">{{$message}}</small>
                           @enderror

                        </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product name(English)</label>
                     <div class="col-sm-12">
                        <input type="text"name="name_en" class="form-control"
                           placeholder="type the product name in english"  value="">
                           @error('name_en')

                           <small  class="form-text text-danger">{{$message}}</small>
                           @enderror

                        </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product description(arabic)</label>
                     <div class="col-sm-12">
                        <input type="text"name="description_ar" class="form-control"
                           placeholder="type the product description in arabic"  value="">
                           @error('description_ar')

                           <small  class="form-text text-danger">{{$message}}</small>
                           @enderror

                        </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product description(english)</label>
                     <div class="col-sm-12">
                        <input type="text"name="description_en" class="form-control"
                           placeholder="type the product description in english"  value="">
                           @error('description_en')

                           <small  class="form-text text-danger">{{$message}}</small>
                           @enderror

                        </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product Image</label>
                     <div class="col-sm-12">
                        <input type="file"  class="form-control" name="image">
                        @error('image')
                        <small  class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product price</label>
                     <div class="col-sm-12">
                        <input type="number" name="item_price" class="form-control"
                           placeholder="type the product price" min="1" max="1000000" >
                           @error('item_price')

                           <small  class="form-text text-danger">{{$message}}</small>
                           @enderror
                        </div>
                  </div>

                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product Status</label>
                     <div class="col-sm-12">
                        <select class="form-control" name="item_status" >
                           <option value="">--</option>
                           <option value="sale">sale</option>
                           <option value="new">new</option>
                        </select>

                    </div>

                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">product quantity</label>
                    <div class="col-sm-12">
                      <input type="text" name="item_quantity" class="form-control">
                   </div>
                 </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product Rating</label>
                     <div class="col-sm-12">
                        <select class="form-control" name="item_rating" >
                           <option value="0">0</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                        </select>
                     </div>

                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product category</label>
                     <div class="col-sm-12">
                        <select class="form-control" name="product_category" >
                           <option value="">--</option>
                           @foreach ($categories as $category)
                           <option value="{{$category->id}}">{{$category->name_en}}</option>

                              @endforeach                        </select>
                     </div>

                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">product brand</label>
                    <div class="col-sm-12">
                       <select class="form-control" name="product_brand" >
                          <option value="">--</option>
                          @foreach ($brands as $brand)
                       <option value="{{$brand->id}}">{{$brand->name_en}}</option>

                          @endforeach
                       </select>

                    </div>

                 </div>
                  <input type="submit"  value="save changes" class="mx-auto d-block">
               </form>
            </div>
         </div>
         @endsection

