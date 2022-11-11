<?php

namespace Tests\Unit\Http\Controllers;


use App\Models\Product;
use Tests\TestCase;use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_returns_view()
    {
        $response = $this->get(route('products.create'));
        $response->assertStatus(200);
        $response->assertViewIs('create-product');
    }

    public function test_edit_returns_view_with_valid_id()
    {
        $this->seed();
        $product = Product::limit(1)->get()[0];
        $id = $product->id;
        $response = $this->get(route('product.edit', $id));
        $response->assertStatus(200);
        $response->assertViewIs('edit-product');
        $response->assertViewHas('product', function ($value) use ($id) {
            return $value->id === $id;
        });
    }

    public function test_edit_returns_404_with_non_valid_product_id()
    {
        $this->seed();
        $id = 0;
        $response = $this->get(route('product.edit', $id));
        $response->assertStatus(404);
    }

    public function test_can_store_valid_product()
    {
        $response = $this->post(route('product.store', [
            'name' => 'ZX-493',
            'manufacturer' => 'Asus',
            'release' => '2021-03-21',
            'cost' => 1800,
            'category' => 'Laptops',
        ]));

        $this->assertDatabaseHas('products', [
            'name' => 'ZX-493',
            'manufacturer' => 'Asus',
            'release' => '2021-03-21',
            'cost' => 1800,
            'category' => 'Laptops',
        ]);
        $response->assertRedirect('/admin');
    }

    public function test_cannot_create_product_with_non_valid_data()
    {
        $this->post(route('product.store', [
            'name' => '',
            'manufacturer' => 'manufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturermanufacturer',
            'release' => 'hnhgy',
            'cost' => 'kje',
            'category' => '',
        ]))
            ->assertSessionHasErrors(['name', 'manufacturer', 'release', 'cost', 'category'])
            ->assertStatus(302);
    }

    public function test_can_update_product()
    {
        $this->seed();
        $product = Product::limit(1)->get()[0];
        $id = $product->id;
        $response = $this->put(route('products.update', $id), [
            'id' => $id,
            'name' => 'ZX-493',
            'manufacturer' => 'Asus',
            'release' => '2021-03-21',
            'cost' => 1800,
            'category' => 'Laptops',
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'ZX-493',
            'manufacturer' => 'Asus',
            'release' => '2021-03-21',
            'cost' => 1800,
            'category' => 'Laptops',
        ]);
        $response->assertRedirect('/admin');
    }

    public function test_if_deleted()
    {
        $this->seed();
        $product = Product::limit(1)->get()[0];
        $id = $product->id;
        $this->delete(route('products.delete', $id));
        $this->assertDatabaseMissing('products', ['id' => $id]);
    }

}
