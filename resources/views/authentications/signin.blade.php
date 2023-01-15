@extends('layout.index')
@section('content')

<main class="container justify-content-center w-50 mt-3">
    <form method="POST" action="{{route('login.perform')}}" >
        @csrf

{{--        <img class="mb-4" src="{{asset('/docs/5.0/assets/brand/bootstrap-logo.svg')}}" alt="" width="72" height="57">--}}
        <h1 class="h3 mt-5  text-center fw-normal">Please sign in</h1>

        <div class="form-floating mt-3 ">
            <input name ="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-3 ">
            <input name="password"type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

    <div class="d-flex justify-content-center mt-3">
        <button style="background-color: #ff7241" class="w-50 text-light btn btn-lg " type="submit">Sign in</button>
    </div>
        <div class="d-flex justify-content-center mt-4">
        
            <a href="{{ route('googleRedirect') }}"> 
                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
            </a>
        </div>
        <p class="mt-5 mb-3 text-center">New user? Click <a href="{{route('register.show')}}">Here</a> to create new account</p>

    </form>
</main>

@endsection
