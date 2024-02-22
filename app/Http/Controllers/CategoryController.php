<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(AdminRequest $request)
    {
        $category=Category::all();
        return view('category.categories')->with('data',$category);
    }

    public function create(AdminRequest $request)
    {
        return view('category.create');
    }

    public function store(StoreRequest $request)
    {
        Category::create($request->validated());
        redirect()->route('products.index');
    }

    public function edit(AdminRequest $request,Category $category)
    {
        return view('category.edit')->with('data',$category);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return  redirect()->route('categories.index')->with('data',['success'=>true,'message'=>'Категория изменена']);
    }

    public function destroy(AdminRequest $request,Category $category)
    {
        $category->delete();
        return  redirect()->route('categories.index')->with('data',['success'=>true,'message'=>'Категория удалена']);
    }
}
