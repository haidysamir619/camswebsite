@extends('layout.all_admin')
@section('title', 'member')

@section('content')

<section id="members-table" class="my-5 ajax-table">
    <div class="container-fluid  text-center" id="ajax-container">
         <h2 class="h1">Manage Members</h2>
         <div class="dashboard">
            <div class="row members-block mb-5">
               <div class="table-responsive">
                  <table class="main table table-bordered text-center">
                     <tr>
                        <td>#ID</td>
                        <td>name ar</td>
                        <td>name en</td>
                        <td>email</td>
                        <td>phone</td>
                        <td>country</td>
                        <td>state</td>
                        <td>city</td>
                        <td>address</td>
                        <td>gender</td>
                        <td>image</td>
                        <td>control</td>

                     </tr>
                     @foreach ($members as $member)
                     <tr>
                        <td>{{$loop->iteration}}</td>{{--1-2-3-4-....--}}
                        <td>{{$member->name_ar}}</td>
                        <td>{{$member->name_en}}</td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->phone}}</td>
                        <td>{{$member->country}}</td>
                        <td>{{$member->state}}</td>
                        <td>{{$member->city}}</td>
                        <td>{{$member->address}}</td>
                        <td>{{$member->gender}}</td>
                        <td><img src="{{asset($member->image)}}" width="95" height="95"></td>
                        <td>
                            <a href="{{route('delete_member',$member->id)}}" class="d-inline-block control-button delete mb-2 m-lg-0"><i class="fas fa-trash-alt"></i> delete</a>
                          <a href="{{route('edit_member',$member->id)}}" class="d-inline-block control-button edit "><i class="fa fa-edit"></i> edit</a>
                       </td>
                     </tr>
                     @endforeach

                  </table>
                  <a class="btn btn-primary  mt-2 float-left" href="{{route('add_member_page')}}">
                  <i class="fa fa-plus mr-2"></i>Add New Member</a>
               </div>
            </div>
      </section>
@endsection

