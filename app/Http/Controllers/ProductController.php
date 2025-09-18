<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_photo' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'is_active' => 'required'
        ]);

        $filePath = null;
        if ($request->hasFile('product_photo')) {
            $filePath = $request->file('product_photo')->store('uploads', 'public');
        }
        products::create(
            [
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'product_photo' => $filePath,
                'product_price' => $request->product_price,
                'product_description' => $request->product_description,
                'is_active' => $request->is_active
            ]
        );
        return redirect()->to('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = products::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = products::find($id);
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        if ($request->hasFile('product_photo')) {
            //Delete foto yang lama...
            if ($product->product_photo && Storage::exists('public/' . $product->product_photo)) {
                Storage::delete('public/' . $product->product_photo);
            }
            $product->product_photo = $request->file('product_photo')->store('uploads', 'public');
        }

        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->is_active = $request->is_active;
        $product->save();

        return redirect()->to('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = products::find($id);
        if ($product->product_photo && Storage::exists('public/' . $product->product_photo)) {
            Storage::delete('public/' . $product->product_photo);
        }
        $product->delete();

        return redirect()->to('product');
    }
}
