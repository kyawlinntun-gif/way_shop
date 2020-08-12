<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Image;

class ProductController extends Controller
{
    
    // Add prdouct page
    public function create()
    {
        return view('admin.product.create');
    }

    // Store product
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required|min:3|unique:products,name',
            'product_code' => 'required|numeric',
            'product_color' => 'required',
            'product_price' => 'required|numeric',
            'product_image'=> 'required|max:1999'
        ]);

        // Get filename with extension
        $filenameWithExt = $request->file('product_image')->getClientOriginalName();

        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $request->file('product_image')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        // Storage image
        $request->file('product_image')->storeAs('public/product', $filenameToStore);

        // Create path and Upload image
        Image::make(storage_path('app/public/product/' . $filenameToStore))->resize(1200, 1200)->save(storage_path('app/public/product/' . $filenameToStore));

        $product = new Product;
        $product->name = ucfirst($request->product_name);
        $product->code = $request->product_code;
        $product->color = $request->product_color;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->image = $filenameToStore;
        $product->save();

        return redirect()->back()->with('success', 'Product was created successfully!');

    }
}
