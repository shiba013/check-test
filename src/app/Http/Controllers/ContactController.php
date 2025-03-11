<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact() {
        return view('contact');
    }

    public function confirm(ContactRequest $request) {
        $contact = $request->only([
            'first_name','last_name','gender',
            'email','tel','address','building',
            'detail'
        ]);
        Contact::create($contact);
        return view('confirm', compact('contact'));
    }

    public function thanks() {
        return view ('thanks');
    }

    public function home() {
        return view('contact');
    }
}
