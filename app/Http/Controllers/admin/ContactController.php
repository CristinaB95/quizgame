<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isAdmin');
        
    }
    public function index(){
        $contacts = Contact::all();
        return view('admin.contact' , ['contacts' => $contacts]);
    }
    public function show($id){
        $contact = Contact::find($id);
        return view('admin.show_contact' , ['message'=>$contact]);
    }
}
