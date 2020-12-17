@extends('layout.all_admin')
@section('title', 'my profile')

@section('content')
      <section id="my-profile" class="my-5">
         <div class="container">
            <div class="information-block">
               <div class="block">
                  <h2>My Information</h2>
               </div>
               <div class="content">
               <form class="login d-block mx-auto" action="{{route('profilechange',Auth::user()->{'id'})}}"
                     method="POST" enctype="multipart/form-data">
                    @csrf
                     <span class="edit-profile float-right">Edit</span>
                     <input type="hidden" name="userid" value="">
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">Arabic Name:</span>
                        </div>
                        <input type="text" name="name_ar" class="form-control" disabled="disabled"
                           value="{{ Auth::user()->{'name_ar'} }}">
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">English Name:</span>
                        </div>
                        <input type="text" name="name_en" class="form-control" disabled="disabled"
                           value="{{ Auth::user()->{'name_en'} }}">
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>
                        </div>
                        <input type="text" name="email" class="form-control" disabled="disabled"
                           value="{{ Auth::user()->{'email'} }}">
                     </div>
                     <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">Image:</span>
                           <img src="../images/member.jpg"
                              width="75" height="75">
                        </div>
                        <input type="file" name="image" class="form-control" disabled="disabled"
                           style="height:auto;line-height: 58px;" height="100%">
                     </div>
                     <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">Gender:</span>
                        </div>
                        <fieldset class="form-group mb-3">
                           <div class="row mt-3">
                              <div class="col-sm-12">
                                 <div class="form-check-inline">
                                    <input
                                    @php if((Auth::user()->{'gender'}) == 'male') { echo "checked"; }
                                    @endphp


                                    class="form-check-input" type="radio" disabled="disabled" name="gender" id="gridRadios1" value="male" checked >
                                    <label class="form-check-label" for="gridRadios1">
                                        male
                                    </label>
                                 </div>
                                 <div class="form-check-inline">
                                    <input
                                    @php if((Auth::user()->{'gender'}) == 'female') { echo "checked"; }
                                    @endphp

                                    class="form-check-input" type="radio" name="gender" disabled="disabled" id="gridRadios2" value="female">
                                    <label class="form-check-label" for="gridRadios2">
                                    female
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </fieldset>
                     </div>
                     <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">new password:
                           </span>
                        </div>
                        <input type="text"  name="password"  class="form-control"disabled="disabled">
                     </div>
                     <input type="submit" disabled="disabled"  name="submit" value="Save Changes"
                        class="btn btn-danger">
                  </form>
               </div>
            </div>
         </div>
         </div>
         <div class="information my-5">
            <div class="container">
               <div class="information-block">
                  <div class="block">
                     <h2>My Comments</h2>
                  </div>
                  @foreach ($reviews as $review)

                  <div class="content">
                     <div class="comment">
                        <p >Item Name: <span class="text-danger"> {{$review->product->name_ar}}</span>
                        </p>
                        <div class="comment-text" style="">
                           <p> {{$review->comment}} </p>
                           <span>{{$review->created_at}}</span>
                        </div>
                     </div>
                  </div>
                 @endforeach
               </div>
            </div>
         </div>
      </section>
   @endsection
