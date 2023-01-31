@extends('layout.index')
@section('content')
<style>
  .list-group-item.active{
    background-color: #ff7241 !important;
    border-color: #ff7241 !important;
  }
</style>
    <div class="container justify-content-center">
<div class="container justify-content-center mt-md-4 mb-md-4 mt-sm-5 my-5 ">
    <div class="row justify-content-md-center">
    <div class="col-md-2">
    <ul class="list-group">
        <a href="{{route('profile.summary')}}" class="list-group-item {{ request()->is("profile/summery") ? 'active' : '' }}">Edit Profile</a>
     <a href="{{route('profile.changePassword')}}" class="list-group-item {{ request()->is("profile/changePassword") ? 'active' : '' }}">Change Password</a>
        <a href="{{route('profile.addReview')}}" class="list-group-item {{ request()->is("profile/addReview") ? 'active' : '' }}">Add Review</a>

        @if(Auth::check() && Auth::user()->role == "admin")
        <a href="" class="list-group-item">Show Admin Page</a>
        @endif
      </ul>
</div>
<div class="col-md-7 ">

    @yield('content2')

</div>
</div>
</div>
</div>
</div>

@endsection