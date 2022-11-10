<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    protected $product;
    protected $services;

    /**
     * @param Product $product
     * @param Service $services
     */
    public function __construct(Product $product, Service $services)
    {
        $this->product = $product;
        $this->services = $services;
    }

    public function index()
    {
        return view('catalog', ['products' => $this->product->all()]);
    }

    /**
     * @param Request $request
     * @param Card $card
     * @param int $id
     */
    public function card(Request $request, Card $card, $id)
    {
        $product = $this->product->firstWhere('id', $id);
        $card->addProduct($product);
        $request->session()->put('card', $card);

        return view('card', [
            'card' => $card,
            'services' => $this->services->where('category', $product->category)->get(),
        ]);
    }

    /**
     * @param Request $request
     * @param int $serviceId
     */
    public function addService(Request $request, $serviceId)
    {
        $card = $request->session()->get('card');
        $card->addService($this->services->firstWhere('id', $serviceId));

        return view('card', [
            'card' => $card,
            'services' => $this->services->where('category', $card->product->category)->get(),
        ]);
    }

    /**
     * @param Request $request
     * @param int $serviceId
     */
    public function removeService(Request $request, $serviceId)
    {
        $card = $request->session()->get('card');
        $card->removeService($this->services->firstWhere('id', $serviceId));

        return view('card', [
            'card' => $request->session()->get('card'),
            'services' => $this->services->where('category', $card->product->category)->get(),
        ]);
    }
}
