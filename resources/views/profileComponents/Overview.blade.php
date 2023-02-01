@extends('../Profile')
@section('content2')


<div class="d-flex align-items-center justify-content-start align-content-start wrap flex-column">
    <form action="{{ route('register.perform') }}" class="pl-1" method="POST">
        @csrf
    
            <div class="d-flex flex-row gap-3 align-content-between ">
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
                <input name='phone_number' type="phone" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">phone number</label>
            </div>
            <div class="form-floating  mb-4 ">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
<div class="d-flex flex-row justify-content-center">

            <button style="background-color: #ff7241" class=" text-light fs-6 btn  " type="submit">Save
                Changes</button>
            </div>
    </form>
</div>
@endsection
