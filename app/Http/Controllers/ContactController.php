<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{



    public function viewPage(){


        return view('contact');
    }

    
    public function index()
    {
        return response([
            "messages" => Contact::all(),
            "status" => 200
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "content" => "required",
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        Contact::create($request->all());

        return redirect()->back()->with([
            "message" => "We recived your message successfully",
            "status" => 200
        ]);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response([
            "message" => "Delete message successfully",
            "status" => 200
        ]);
    }
}
