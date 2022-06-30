<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

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

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => Str::headline($request->name),
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')->with('success', "Category $category->name created successfully");
    }

    public function update(UpdateCategoryRequest $request, string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        $category->name = Str::headline($request->name);
        $category->slug = Str::slug($request->name);
        $category->save();

        $request->session()->forget('category');
        $request->session()->forget('action');

        return redirect()->route('categories.index')->with('success', "Category '$category->name' updated successfully");
    }
}
