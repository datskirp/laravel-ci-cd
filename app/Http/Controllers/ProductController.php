<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request, Product $product)
    {
        $validated = $request->validated();
        $product->fill($validated)->save();

        return redirect('/admin')->with('success', 'Product was created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     */
    public function edit(Product $product, $id)
    {
        return view('edit-product', [
            'product' => $product->firstWhere('id', $id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product      $product
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        $validated = $request->validated();
        $product->where('id', $request->input('id'))->update($validated);

        return redirect('/admin')->with('success', sprintf('Product with id: %s was updated', $request->input('id')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     */
    public function destroy(Product $product, $id)
    {
        $product->firstWhere('id', $id)->delete();

        return back()->with('success', sprintf('Product with id: %s was deleted', $id));
    }
}
