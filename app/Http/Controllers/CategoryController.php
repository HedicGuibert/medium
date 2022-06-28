<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate(5);

        return view('category.list', compact('categories'));
    }

    public function delete(DeleteCategoryRequest $request, string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categoryName = $category->name;
        $category->delete();
        return redirect()->route('categories.index')->with('success', "Category '$categoryName' successfully deleted");
    }
}
