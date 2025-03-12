<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function contact() {
        $categories = Category::all();
        return view('contact',compact('category'));
    }

    public function confirm(ContactRequest $request) {
        $contact = $request->only(['first_name', 'last_name','gender','email', 'tel_1','tel_2','tel_3', 'address','building','category_id','detail']);
        $category = Category::find($contact['category_id']);
        return view('confirm', compact('contact','category'));
    }

    public function store(ContactRequest $request) {
        $contact = $request->only(['first_name', 'last_name','gender','email', 'tell1','tell2','tell3', 'address','building','category_id','detail']);
        Contact::create($contact);
        return view ('thanks');
    }

    public function home() {
        return view('contact');
    }
}
