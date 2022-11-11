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
        if (!$product = $this->product->firstWhere('id', $id)) {
            abort(404);
        }
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
        if (!$service = $this->services->firstWhere('id', $serviceId)) {
            abort(404);
        }
        $card->addService($service);

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
        if (!$service = $this->services->firstWhere('id', $serviceId)) {
            abort(404);
        }
        $card->removeService($service);

        return view('card', [
            'card' => $card,
            'services' => $this->services->where('category', $card->product->category)->get(),
        ]);
    }
}
