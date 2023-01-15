<?php

namespace App\Http\Controllers;

use App\Models\Newsletter as ModelsNewsletter;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class Newsletter extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new ModelsNewsletter();

        if ($data) {
            return response()->json('data', json_encode($data));
        } else {
            return response()->json('data', "No data available");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $email = $request->validate([
            "email" => "required|email",
        ]);
        $catch = $request->only('email');

        $emailCheck = ModelsNewsletter::find(request()->all());
        if ($emailCheck) {
            return redirect()->back()->with("success", 'email is already in newsletter list');
        } else {
            // $record=new ModelsNewsletter;
            // $
            ModelsNewsletter::create(request()->all());
            return redirect()->back()->with("success", 'email has been added to the news letter list');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
