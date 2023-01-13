<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{

    // ============ get methods ============
    //return all users
    public function getUsers($id = null)
    {
        return $id ? User::findOrFail($id) : User::all();
    }

    //return all Order
    public function getOrder($id = null)
    {
        if ($id) {
            $data = [
                'Order' => Order::findOrFail($id),
                // 'comments' => Order::findOrFail($id)->comments,
            ];
        } else {
            $data = [
                'Order' => Order::all(),
            ];
        }
        return response()->json($data);
    }

    //return all comments
    // public function getComments($id = null)
    // {
    //     return $id ? Comment::findOrFail($id) : Comment::all();
    // }

    // ============ post methods ============

    //store new user
    public function storeUser(Request $request)
    {
        $formFields = $request->validate(
            [
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            ],
            [
                'password.regex' => 'The password should have minimum eight characters,
            at least one letter, one number and one special character'
            ]
        );


        // Hash Password
        $formFields['password'] = Hash::make($formFields['password']);

        // Create user
        $user = new User();
        $user->name = ucfirst(strtolower($formFields['name']));
        $user->email = strtolower($formFields['email']);
        $user->password = $formFields['password'];
        $check =  $user->save();

        if ($check) {
            return ['results' => 'user added successfully'];
        } else {
            return ['results' => 'unknown error  occured '];
        }
        // Login
        // auth()->login($user);

    }

    // store new Order

    public function storeOrder(Request $request)
    {

        $Order = new Order;
        $Order->id = $request->id;
        $Order->title = $request->OrderName;
        $Order->author = $request->author;
        $Order->pages = $request->pages;
        $Order->backgroundImage = $request->backgroundImage;
        $check = $Order->save();

        if ($check) {
            return ['results' => 'Order added successfully'];
        } else {
            return ['results' => 'unknown error  occured '];
        }
    }

    // update user
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = ucfirst(strtolower($request['name']));
        $user->email = strtolower($request['email']);
        $user->role = $request['role'];
        $user->is_premium = $request['is_premium'];
        $check =  $user->save();

        if ($check) {
            return ['results' => 'user updated successfully'];
        } else {
            return ['results' => 'update error'];
        }
    }
    // update Order
    public function updateOrder(Request $request)
    {
        $Order = Order::findOrFail($request->id);
        $Order->title = $request['title'];
        $Order->author = strtolower($request['author']);
        $Order->backgroundImage = Hash::make($request['backgroundImage']);
        $Order->pages = $request['pages'];
        $Order->is_premium = $request['is_premium'];
        $check =  $Order->save();

        if ($check) {
            return ['results' => 'Order updated successfully'];
        } else {
            return ['results' => 'update error'];
        }
    }

    //delete user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return ['status' => 'user has been deleted successfully'];
    }


    //delete Order
    public function deleteOrder(Request $request)
    {
        $Order = Order::findOrFail($request->id);
        $Order->delete();
        return ['status' => 'Order has been deleted successfully'];
    }

}
