<?php

namespace Tests\Unit\Http\Controllers;

use App\Models\Card;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CatalogControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view()
    {
        $response = $this->get('');
        $response->assertStatus(200);
        $response->assertViewIs('catalog');
        $response->assertViewHas('products');
    }

    public function test_card_returns_view_with_valid_product_id()
    {
        $this->seed();
        $product = Product::limit(1)->get()[0];
        $id = $product->id;
        $response = $this->get(route('catalog.card', $id));
        $response->assertStatus(200);
        $response->assertViewIs('card');
        $response->assertSessionHas('card', function ($value) use ($id) {
            return $value->product->id === $id;
        });
        $response->assertViewHas('card');
        $response->assertViewHas('services', function ($value) use ($product) {
            return $value[0]->category === $product->category;
        });
    }

    public function test_card_returns_404_with_non_valid_product_id()
    {
        $this->seed();
        $id = 0;
        $response = $this->get(route('catalog.card', $id));
        $response->assertStatus(404);
    }

    public function test_add_service_returns_view()
    {
        $this->seed();
        $product = Product::limit(1)->get()[0];
        $service = Service::limit(1)->get()[0];
        $id = $service->id;
        Session::start();
        $card = new Card();
        $card->addProduct($product);
        Session::put('card', $card);

        $response = $this->get(route('catalog.add-service', $id));

        $response->assertStatus(200);
        $response->assertViewIs('card');
        $response->assertViewHas('card', function ($value) use ($id) {
            return $value->services[$id]->id === $id;
        });
        $response->assertViewHas('services', function ($value) use ($product) {
            return $value[0]->category === $product->category;
        });
    }

    public function test_add_service_returns_404_with_non_valid_service_id()
    {
        $this->seed();
        $id = 0;
        $response = $this->get(route('catalog.add-service', $id));
        $response->assertStatus(404);
    }

    public function test_remove_service_returns_view()
    {
        $this->seed();
        $product = Product::limit(1)->get()[0];
        $service = Service::limit(1)->get()[0];
        $id = $service->id;
        Session::start();
        $card = new Card();
        $card->addProduct($product);
        Session::put('card', $card);

        $response = $this->get(route('catalog.remove-service', $id));

        $response->assertStatus(200);
        $response->assertViewIs('card');
        $response->assertViewHas('card', function ($value) use ($id) {
            return !isset($value->services[$id]);
        });
        $response->assertViewHas('services', function ($value) use ($product) {
            return $value[0]->category === $product->category;
        });
    }
}
