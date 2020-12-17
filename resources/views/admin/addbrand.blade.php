@extends('layout.all_admin')
@if(url()->current()==route('add_category_page'))
@section('title', 'add category')
@elseif(url()->current()==route('add_brands_page'))
@section('title', 'add brand')
@endif

@section('content')
      <section id="add-category"  class="my-5 ajax-block">
         <div class="container" id="ajax-add-container">
            <h2 class="text-center h1">Add New {{$type}}</h2>
            <div class="add-block">
               <form id="add"
               @if(url()->current()==route('add_brands_page'))
            action="{{route('add_brand')}}"
            @elseif(url()->current()==route('add_category_page'))
               action="{{route('add_category')}}"
            @endif
               method="post" enctype="multipart/form-data">

                @csrf
                <div class="form-group row">
                     <div class="col-sm-10">
                        <input type="hidden" name="id" class="form-control">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">{{$type}} Name(arabic)</label>
                     <div class="col-sm-12">
                        <input type="text"name="name_ar" class="form-control"
                           placeholder="type the name of category in arabic"   value="{{old('value')}}">

                        </div>
                        @error('name_ar')
                        <span class="bg-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">{{$type}} Name(english)</label>
                     <div class="col-sm-12">
                        <input type="text"name="name_en" class="form-control"
                           placeholder="type the name of category in english"  value="{{old('value')}}">
                     </div>
                     @error('name_en')
                     <span class="bg-danger">
                         <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>


                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">{{$type}} Image</label>
                     <div class="col-sm-12">
                        <input type="file"  class="form-control" name="image">
                        @error('image')
                        <span class="bg-danger" role="">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <input type="submit"  value="save changes" class="mx-auto d-block">
               </form>
            </div>
         </div>
      </section>
@endsection
{{-- @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection --}}
