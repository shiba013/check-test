<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Contact;
use App\Models\Category;

class CategoryController extends Controller
{
    public function contact() {
        $categories = Category::all();
        return view('contact');
    }

    public function confirm(CategoryRequest $request) {
        $categories = Category::all();
        return view('confirm',compact('category'));
    }
}
