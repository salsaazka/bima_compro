<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUs = Contact::all();
        return view('dashboard.contact', compact('contactUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // return view('dashboard.contact', compact('contactUs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'no_telp'=> 'required',
            'address'=> 'required',
            'web' => 'required'
        ]);
        Contact::create([
            'email'=> $request->email,
            'no_telp' => $request->no_telp,
            'address' => $request->address,
            'web' => $request->web,
        ]);
        return redirect()->back()->with('success', 'Anda berhasil mengedit data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $contactUs= Contact::where('id', $id)->first();
        return view('/dashboard/contact', compact('contactUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email'=>'required',
            'no_telp'=> 'required',
            'address'=> 'required',
            'web' => 'required'
        ]);
        Contact::where('id', $id)->update([
            'email'=> $request->email,
            'no_telp' => $request->no_telp,
            'address' => $request->address,
            'web' => $request->web,
        ]);
        return view('/')->with('success', 'Anda berhasil mengedit data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
