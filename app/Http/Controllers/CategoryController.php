<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.add-new-category');
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        
        
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Category::create($input);

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
        $category = Category::findOrFail($id);

        return view('categories.edit-category', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
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
        
        $category = Category::findOrFail($id);
        $category->update($input);

        return back()
            ->with('status','Category updated!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category->image !== null){
            $imagePath = public_path().'/images/'.$category->image;
            unlink($imagePath);
            // dd('hello yes');
        }

        $category->delete();

        return back()->with('status', 'Category delete!');
    }
}
