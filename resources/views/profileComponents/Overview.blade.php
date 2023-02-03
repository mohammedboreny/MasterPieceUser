@extends('../Profile')
@section('content2')
@if(session()->has('status'))
    <div style="background-color: #ff7241" class="alert text-light text-center"> {{session()->get('status')}}</div>
@endif
@if(session()->has('success'))
<div style="background-color: #ff7241" class="alert text-light text-center"> {{session()->get('success')}}</div>
@endif
@if(session()->has('error'))
<div style="background-color: red" class="alert text-light text-center"> {{session()->get('error')}}</div>
@endif
{{-- {{dd($data)}} --}}
<div class="d-flex justify-content-start align-content-start wrap flex-column">
    <form action="{{ route('profile.edit', $data->id) }}" class="" method="POST">
         @csrf
        @method('PATCH')
            <div class="d-flex flex-column gap-3 align-content-between ">
                @if ($data->auth_type==null && $data->fullName==null)
                <div class="form-floating mb-4">
                    <input name='firstName'type="text" class="form-control" value="{!! $data->firstName !!}" id="floatingInput" placeholder="FirstName">
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="form-floating mb-4">
                    <input name='lastName' type="text" value="{{$data->lastName}}" class="form-control" id="floatingPassword" placeholder="last Name">
                    <label for="floatingPassword">Last Name</label>
                </div>
            </div>
            @else
            <div class="form-floating mb-4">
                <input name='fullName' type="text" value="{{$data->fullName}}" class="form-control" id="floatingPassword" placeholder="full Name">
                <label for="floatingPassword">Full Name</label>
            </div>
            @endif
            @if ($data->phone_number!=null)
            <div class="form-floating mb-4">
                <input name='phone_number' value="{{$data->phone_number}}" type="phone" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">phone number</label>
            </div>
            @else
            
            <div class="form-floating mb-4">
                <input name='phone_number' type="phone" class="form-control" id="floatingPassword" placeholder="phone_number">
                <label for="phone_number">phone number</label>
                <sub  class=" fst-italic  text-dark alert-light"> Kindly Provide Us with your phone number<sub>
            </div>
            @endif
            <div class="form-floating  mb-4 ">
                <input name="email" type="email" value="{{$data->email}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger text-left">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach    
                </div>
            @endif
<div class="d-flex flex-row justify-content-center">

            <button style="background-color: #ff7241" class=" text-light fs-6 btn  " type="submit">Save
                Changes</button>
            </div>
    </form>
</div>
@endsection
