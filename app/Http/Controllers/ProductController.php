<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('dashboard', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('products.add-new-product', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string|max:225',
            'category_id' => 'required',
            'price' => 'required',
            'amount'=>'required',
            'image' => 'required|mimes:png,gif,jpg,jpeg,bmp,svg|max:2048',
        ]);
      
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string|max:225',
            'category_id' => 'required',
            'price' => 'required',
            'amount'=>'required',
        ]);
      
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
