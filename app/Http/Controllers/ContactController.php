<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactInquiry;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $this->validation($request);
        Contact::create($request->all());
        Mail::send(new ContactInquiry());
        return redirect('contact-us')->with('status','Your message has been sent successfully');
    }
    
    public function validation($request)
    {
        return $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'subject' => 'required|string|max:40',
            'message' => 'required|string|max:255',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

}
