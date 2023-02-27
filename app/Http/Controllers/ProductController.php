<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $categories = Category::get();
        return view('dashboard', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('products.add-new-product', compact('categories'));
    }

    public function store(ProductRequest $request)
    { 
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);

        return back()
            ->with('status','Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('products.edit-product', compact('categories', 'product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $input = $request->all();
        
        
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        
        $product = Product::findOrFail($id);
        $product->update($input);

        return back()
            ->with('status','Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path().'/images/'.$product->image;
        unlink($imagePath);

        $product->delete();

        return back()->with('status', 'Product delete!');
    }
}
