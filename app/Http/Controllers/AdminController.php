<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $product;
    protected $services;

    /**
     * @param $product
     */
    public function __construct(Product $product, Service $services)
    {
        $this->product = $product;
        $this->services = $services;
    }

    public function index()
    {
        return view('admin', [
            'products' => $this->product->all(),
            'services' => $this->services->all(),
        ]);
    }
}
