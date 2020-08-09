<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Category::where('parent_id', '=', 0)->get();
        $res = new Collection;
        return view('home.contacts.create',compact('menus','res'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $contact = new Contact;

        $contact->title         = $request->title;
        $contact->name          = $request->name;
        $contact->email         = $request->email;
        $contact->address       = $request->address;
        $contact->phone         = $request->phone;
        $contact->content       = $request->content;
        $contact->save();

        Mail::to($request->email)

        ->send(new ContactMail($contact));

        return redirect(route('welcome'))->with('success', 'Liên hệ đã được gửi đi, chúng tôi sẽ liên lạc lại trong thời gian sớm nhất.');
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