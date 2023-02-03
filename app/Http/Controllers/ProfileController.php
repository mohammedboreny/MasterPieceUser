<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Location;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getBookings()
    {
        if (!Auth::check()) {
            return View('authentications.signin');;
        }
        // dd(Auth::user()->id);
        $data = Booking::all()->where('user_id', Auth::user()->id)->toArray();

        return View('profileComponents.Bookings')->with('data', $data);
    }


    public function ViewProfile()
    {
        if (!Auth::check()) {
            return View('authentications.signin');
        }

        $data = User::all()->where('id', Auth::user()->id)->first();
        return View('profileComponents.Overview')->with('data', $data);
    }




    public function editProfile(Request $rq, $id)
    {


        $rq->validate([
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email:rfc,dns|unique:users,email',
        ]);
        $data = User::where('id', $id)->update($rq->except(['_token', '_method']));

        return redirect()->back()->with('status', 'User updated successfully');
    }


    public function viewPasswordEdit(){
        if (!Auth::check()) {
            return View('authentications.signin');
        }
        elseif (Auth::user()->auth_type!=null){
        return redirect()->back()->with('status', 'You have logged in using  ' . Auth::user()->auth_type .  '  ,you are not allowed to change your password');
    }
        return View('profileComponents.changePassword');
    }

    public function updatePassWord(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        /*
* Validate all input fields
*/
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'confirmed|max:8|different:password',
        ]);

        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            $request->session()->flush('success', 'Password changed');
            return redirect()->back();
        } else {
            $request->session()->flush('error', 'Password does not match');
            return redirect()->back();
        }
    }
}
