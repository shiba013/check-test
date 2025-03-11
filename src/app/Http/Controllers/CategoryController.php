<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function contact() {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

        public function confirm(CategoryRequest $request) {
        $category = $request->only([
            'content'
        ]);
        Category::create($category);
        return view('confirm', compact('category'));
    }
}
