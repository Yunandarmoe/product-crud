<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $imageuploaded = $request->file('image');
            $imagename = time() . '_' . $imageuploaded->getClientOriginalName();
            $filepath = 'public/images';
            $imagepath = $request->image->storeAs($filepath, $imagename);
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'images/' . $imagename,
        ]);

        return redirect()->route('product.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageuploaded = $request->file('image');
            $imagename = time() . '_' . $imageuploaded->getClientOriginalName();
            $filepath = 'public/images';
            $imagepath = $request->image->storeAs($filepath, $imagename);
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'images/' . $imagename
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
