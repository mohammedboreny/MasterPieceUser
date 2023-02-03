@extends('layout.index')
@section('content')
<style>
    @media (max-width:720px ){
        .PageHeader{
            margin-top: 40px !important;
        }
    }

  .list-group-item.active{
    background-color: #ff7241 !important;
    border-color: #ff7241 !important;
  }
</style>
    <div class="container justify-content-center mt-md-4 ">
<div class="container justify-content-center mt-md-5 mb-md-5 mt-sm-5 my-5 ">
    <div class="row justify-content-md-center">
    <div class="col-md-2">
    <ul class="list-group">
        <a href="{{route('profile.summary')}}" class="list-group-item {{ request()->is("profile/summery") ? 'active' : '' }}">Edit Profile</a>
        @if (Auth::user()->auth_type==null)
     <a href="{{route('profile.changePassword')}}" class="list-group-item {{ request()->is("profile/changePassword") ? 'active' : '' }}">Change Password</a>
        @endif
        <a href="{{route('profile.addReview')}}" class="list-group-item {{ request()->is("profile/addReview") ? 'active' : '' }}">Add Review</a>

        @if(Auth::check() && Auth::user()->role == "admin")
        <a href="" class="list-group-item">Show Admin Page</a>
        @endif
      </ul>
</div>
<div class="col-md-7 PageHeader ">

    @yield('content2')

</div>
</div>
</div>
</div>
</div>

@endsection