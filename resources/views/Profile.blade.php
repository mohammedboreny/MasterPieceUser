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
        <a href="{{route('profile.summary',['id'=>1])}}" class="list-group-item {{ request()->is('profile/1/summery') ? 'active' : '' }}">Edit Profile</a>
        <a href="{{route('profile.Bookings',['id'=>1])}}" class="list-group-item {{ request()->is('profile/1/Bookings') ? 'active' : '' }}">Bookings</a>
        <a href="{{route('profile.addReview',['id'=>1])}}" class="list-group-item {{ request()->is('profile/1/addReview') ? 'active' : '' }}">Add Review</a>

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