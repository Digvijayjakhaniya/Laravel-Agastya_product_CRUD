<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Log;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
        //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $product = new Product();
        $product->title = $validatedData['title'];
        $product->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if ($image->move(public_path('img/product_image'), $imageName)) {
                $product->image = $imageName;
            } else {
                Log::error('Failed to move the uploaded image.');
                return back()->with('error', 'Failed to upload image. Please try again.');
            }
        }
        $product->save();
        return redirect()->route('admin.home.index');
    }



    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     return redirect()->route('admin.home.index');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products=product::find($id);
        return view('admin.home.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required|min:6',
        'image' => 'image|mimes:jpeg,png,jpg,gif',
    ]);

    $product = Product::findOrFail($id);

    $product->title = $request->title;
    $product->description = $request->description;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        if ($product->image) {
            $oldImagePath = public_path('img/product_image/' . $product->image);

            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            } else {
                Log::error('Old image file not found at path: ' . $oldImagePath);
            }
        }

        $image->move(public_path('img/product_image'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()->route('admin.home.index')->with('success', 'Product updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        product::where('id',$id)->delete();
        return redirect()->route('admin.home.index');
    }
}
