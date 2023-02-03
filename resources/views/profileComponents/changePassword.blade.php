@extends('Profile')
@section('content2')


    <form  id="form" method="POST"  action=" {{route('profile.updatePassWord')}} ">
        @csrf
        @method('PATCH')
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="" placeholder="passwor">
            <label for="password" class="form-label">Old Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="new_password" id="" placeholder="password">
            <label for="NPassword" class="form-label">New Password</label>
        </div>
        <div class="d-flex align-content-center flex-wrap justify-content-center  ">
            <button style="background-color:#ff7241 " class="btn text-light  " type="submit">Change Password</button>
        </div>
    </form>

    <script async>
        // let form = document.getElementById('form');


        // form.addEventListener('submit', function(e) {
        //             e.preventDefault();
        //             console.log(e.target.NPassword.value);
        //             console.log(e.target.Password.value);
        // });
    </script>
@endsection
