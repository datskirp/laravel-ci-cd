<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    protected $products;

    /**
     * @param $products
     */
    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function index()
    {
        return view('admin-products', ['products' => $this->products->all()]);
    }

}
