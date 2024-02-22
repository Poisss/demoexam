<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function indexadmin(){
        $product=Product::all()->orderBy('id','DESC');
        return view('admin.product.products')->with('data',$product);
    }

    public function index()
    {
        $product=Product::all()->where('qty','!=',0)->orderBy('id','DESC');
        return view('product.products')->with('data',$product);
    }

    public function create(AdminRequest $request)
    {
        return view('product.create');
    }

    public function store(StoreRequest $request)
    {
        $path=$request->file('image')->store('/','public');
        Product::create(['path'=>$path]+$request->validated());
        redirect()->route('products.index')->with('data',['success'=>true,'message'=>'Товар создан']);
    }

    public function show(Product $product)
    {
        return view('product.show')->with('data',$product);
    }

    public function edit(AdminRequest $request,Product $product)
    {
        return view('product.edit')->with('data',$product);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->validated());
        return  redirect()->route('products.index')->with('data',['success'=>true,'message'=>'Товар изменен']);
    }

    public function destroy(AdminRequest $request,Product $product)
    {
        $product->image->map(function($image) {

            Storage::disk('public')->delete($image->path);
        });
        $product->delete();
        return  redirect()->route('products.index')->with('data',['success'=>true,'message'=>'Товар удален']);
    }
}
