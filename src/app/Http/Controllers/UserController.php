<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Contact;
use App\Models\Category;

class UserController extends Controller
{
    public function index() {
        //$contacts = Contact::Paginate(7);
        $categories = Category::all();
        return view('admin', compact('categories'));
    }

    public function search(Request $request) {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();
        return view('admin', compact('contacts','categories'));
    }

}