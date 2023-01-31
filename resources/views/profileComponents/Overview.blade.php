@extends('../Profile')
@section('content2')
<form action="{{ route('register.perform') }}" method="POST">
    @csrf
    {{--        <img class="mb-4" src="{{asset('/docs/5.0/assets/brand/bootstrap-logo.svg')}}" alt="" width="72" height="57"> --}}
<div class="d-flex  gap-5 flex-row">
    <div class="form-floating mb-4">
        <input name='firstName'type="text" class="form-control" id="floatingInput" placeholder="FirstName">
        <label for="floatingInput">First Name</label>
    </div>
    <div class="form-floating mb-4">
        <input name='lastName' type="text" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Last Name</label>
    </div>
</div>
    <div class="form-floating w-75 mb-4">
        <input name='phone_number' type="phone" class="form-control" id="floatingPassword"
            placeholder="Password">
        <label for="floatingPassword">phone number</label>
    </div>
    <div class="form-floating w-75 mb-4 ">
        <input name="email" type="email" class="form-control" id="floatingInput"
            placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>
    @if ($errors->has('email'))
        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
    @endif

    <div class="d-flex justify-content-end  mt-3">
    <button style="background-color: #ff7241" class=" text-light fs-6 btn btn-lg " type="submit">Save Changes</button>
    </div>
</form>
@endsection