@extends('layout.all_admin')
@section('title', 'edit product')
@section('content')
      <section id="edit-product" class="my-5">
         <div class="container">
            <h2 class="text-center h1">Edit product Information</h2>
            <div class="edit-block">
               <form action="{{route('update_product',$product->id)}}" method="post" enctype="multipart/form-data">
                 @csrf
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">Product Name(Arabic)</label>
                     <div class="col-sm-12">
                        <input type="text" name="name_ar" class="form-control"
                     placeholder="type the product name in arabic"  value="{{$product->name_ar}}">
                     @error('name_ar')
                     <span class="bg-danger">
                         <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">Product Name(English)</label>
                     <div class="col-sm-12">
                        <input type="text" name="name_en" class="form-control"
                           placeholder="type the product name in english"  value="{{$product->name_en}}">
                           @error('name_en')
                           <span class="bg-danger">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">Product Description(Arabic)</label>
                     <div class="col-sm-12">
                        <input type="text"name="description_ar" class="form-control"
                           placeholder="type the product description in arabic"  value="{{$product->description_ar}}">
                           @error('description_ar')
                           <span class="bg-danger">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">Product Description(English)</label>
                     <div class="col-sm-12">
                        <input type="text"name="description_en" class="form-control"
                           placeholder="type the product description in english"  value="{{$product->description_en}}">
                           @error('description_en')
                           <span class="bg-danger">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product Image</label>
                     <div class="col-sm-12">
                        <input type="file"  class="form-control" name="image">
                        <input type="hidden" name="oldimage"  value="{{$product->image}}">
                        @error('image')
                        <span class="bg-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product price</label>
                     <div class="col-sm-12">
                        <input type="number" name="item_price" class="form-control"
                           placeholder="type the item price" min="1" max="1000000" value="{{$product->price}}">
                           @error('item_price')
                           <span class="bg-danger">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product Status</label>
                     <div class="col-sm-12">
                        <select class="form-control" name="item_status" required>
                           <option value="sale"
                           @php if(($product->status) == 'sale') { echo "selected=selected"; }
                            @endphp

                           >sale</option>
                           <option value="new"
                           @php if(($product->status) == 'new') { echo "selected=selected"; }
                           @endphp
                           >new</option>
                        </select>
                        @error('item_status')
                        <span class="bg-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">product quantity</label>
                    <div class="col-sm-12">
                    <input type="text" name="item_quantity" class="form-control" value="{{$product->quantity}}">
                   </div>
                 </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product Rating</label>
                     <div class="col-sm-12">
                        <select class="form-control" name="item_rating" >
                            <option value="0"
                            @php if(($product->rate) == '0') { echo "selected=selected"; }
                             @endphp
                             >0</option>                           <option value="1"
                           @php if(($product->rate) == '1') { echo "selected=selected"; }
                            @endphp
                            >1</option>
                           <option value="2" @php if(($product->rate) == '2') { echo "selected=selected"; }
                            @endphp>2</option>
                           <option value="3" @php if(($product->rate) == '3') { echo "selected=selected"; }
                            @endphp>3</option>
                           <option value="4" @php if(($product->rate) == '4') { echo "selected=selected"; }
                            @endphp>4</option>
                           <option value="5" @php if(($product->rate) == '5') { echo "selected=selected"; }
                            @endphp>5</option>
                        </select>
                        @error('item_rating')
                        <span class="bg-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">product category</label>
                     <div class="col-sm-12">
                        <select class="form-control" name="product_category" >
                            <option value="">--</option>

                            @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                        @php if(($product->category_id) == $category->id) { echo "selected=selected"; }
                            @endphp>{{   $category->name_en
                    }}</option>

                            @endforeach
                        </select>

                     </div>
                     @error('product_category')
                     <span class="bg-danger">
                         <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">product brand</label>
                    <div class="col-sm-12">
                       <select class="form-control" name="product_brand" >
                          <option value="">--</option>
                          @foreach ($brands as $brand)
                          <option value="{{$brand->id}}"
                          @php if(($product->brand_id) == $brand->id) { echo "selected=selected"; }
                              @endphp>{{   $brand->name_en
                      }}</option>

                              @endforeach
                       </select>


                    </div>
                    @error('product_brand')
                       <span class="bg-danger">
                           <strong>{{ $message }}</strong>
                       </span>
                       @enderror

                 </div>
                  <input type="submit"  value="save changes" class="mx-auto d-block">
               </form>
            </div>
         </div>
      </section>
@endsection
