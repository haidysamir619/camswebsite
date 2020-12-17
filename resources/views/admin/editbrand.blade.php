@extends('layout.all_admin')
@if(url()->current()==route('edit_category',$brand->id))
@section('title', 'edit category')
@elseif(url()->current()==route('edit_brands',$brand->id))
@section('title', 'edit brand')
@endif
@section('content')
      <section id="edit-category" class="my-5">
         <div class="container">
            <h2 class="text-center h1">Edit {{$type}} Information</h2>
            <div class="edit-block">
            <form
            @if(url()->current()==route('edit_category',$brand->id))
            action="{{route('update_category',$brand->id)}}"
            @elseif(url()->current()==route('edit_brands',$brand->id))
            action="{{route('update_brand',$brand->id)}}"
             @endif
            method="post" enctype="multipart/form-data">
            @csrf{{--error 419 expired--}}
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">{{$type}} Name(Arabic)</label>
                     <div class="col-sm-12">
                        <input type="text"name="name_ar" class="form-control"
                           placeholder="type the name of category in arabic"  value="{{$brand->name_ar}}">
                           @error('name_ar')
                           <span class="bg-danger">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                  </div>
                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">{{$type}} Name(English)</label>
                     <div class="col-sm-12">
                        <input type="text"name="name_en" class="form-control"
                           placeholder="type the name of category in english" value="{{$brand->name_en}}">
                           @error('name_en')
                           <span class="bg-danger">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                  </div>

                  <div class="form-group row">
                     <label  class="col-sm-12 col-form-label">{{$type}} Image</label>
                     <div class="col-sm-12">
                        <input type="file"  class="form-control" name="image">
                        <input type="hidden" name="oldimage" value="{{$brand->image}}">
                        @error('image')
                        <span class="bg-danger">
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
