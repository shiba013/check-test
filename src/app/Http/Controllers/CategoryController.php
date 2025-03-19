<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Contact;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function add(CategoryRequest $request) {
        $category = $request->only('content');
        Category::create($category);
        return redirect('/categories');
    }

    public function update(CategoryRequest $request) {
        $category = $request->only(('content'));
        Category::find($request->id)->update($category);
        return redirect('/categories');
    }

    public function destroy(Request $request) {
        $category = $request->only(('content'));
        Category::find($request->id)->delete();
        return redirect('/categories');
    }
}
