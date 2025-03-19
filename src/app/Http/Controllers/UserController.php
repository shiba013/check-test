<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Contact;
use App\Models\Category;

class UserController extends Controller
{
    public function index() {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts','categories'));
    }

    public function search(Request $request) {
        $contacts = Contact::with('category')
        ->CategorySearch($request->category_id)
        ->GenderSearch($request->gender)
        ->KeywordSearch($request->keyword)
        ->DataSearch($request->created_at)
        ->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts','categories'));
    }

    public function destroy(Request $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}