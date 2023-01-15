@extends('layout.index')
@section('content')

        <!-- Background image -->
<div class="container-fluid  justify-center ">
    <main class="d-grid  justify-content-center  my-5 w-100 ">
        <h1 class="h3 text-center mb-3 fw-normal "> Register </h1>
        <form action="{{ route('register.perform') }}" method="POST">
            @csrf
            {{--        <img class="mb-4" src="{{asset('/docs/5.0/assets/brand/bootstrap-logo.svg')}}" alt="" width="72" height="57"> --}}
<div class="d-flex justify-content-between gap-5 flex-row">
            <div class="form-floating mb-4">
                <input name='firstName'type="text" class="form-control" id="floatingInput" placeholder="FirstName">
                <label for="floatingInput">First Name</label>
            </div>
            <div class="form-floating mb-4">
                <input name='lastName' type="text" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Last Name</label>
            </div>
        </div>
            <div class="form-floating mb-4">
                <input name='phone_number' type="phone" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">phone number</label>
            </div>
            <div class="form-floating mb-4 ">
                <input name="email" type="email" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
            <div class="form-floating mb-4 ">
                <input name="password" type="password" class="form-control w-100" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
            <div class="form-floating mb-3">
              
                    <input placeholder="re-type Password" name="password_confirmation" id="floatingPassword2" class='form-control w-100' type="password" value="">
                    <label for="floatingPassword2">Retype-Password</label>
            </div>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
            <div class="d-flex justify-content-center mt-3">

            <button style="background-color: #ff7241" class=" text-light fs-6 btn btn-lg " type="submit">Sign Up</button>
            </div>
        </form>
    </main>
</div>
@endsection