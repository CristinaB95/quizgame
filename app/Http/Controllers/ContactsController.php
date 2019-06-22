<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    public function index(){
        $contacts= Contact::all();
        return view('contacts/index', ['contacts'=>$contacts]);

    }
    public function create(){
        return view('contacts/create');
    }
    public function store(Request $request){
        $contact = new Contact();
        $contact->name = request('name');
        $contact->phone = request('phone');
        $contact->save();
        exit();
    }
}
