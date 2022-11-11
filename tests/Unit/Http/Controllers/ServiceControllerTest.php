<?php

namespace Tests\Unit\Http\Controllers;

use App\Models\Service;
use Tests\TestCase;use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_returns_view()
    {
        $response = $this->get(route('services.create'));
        $response->assertStatus(200);
        $response->assertViewIs('create-service');
    }

    public function test_edit_returns_view_with_valid_id()
    {
        $this->seed();
        $service = Service::limit(1)->get()[0];
        $id = $service->id;
        $response = $this->get(route('service.edit', $id));
        $response->assertStatus(200);
        $response->assertViewIs('edit-service');
        $response->assertViewHas('service', function ($value) use ($id) {
            return $value->id === $id;
        });
    }

    public function test_edit_returns_404_with_non_valid_product_id()
    {
        $this->seed();
        $id = 0;
        $response = $this->get(route('service.edit', $id));
        $response->assertStatus(404);
    }

    public function test_can_store_valid_service()
    {
        $response = $this->post(route('service.store', [
            'type' => 'warranty',
            'deadline' => 365,
            'cost' => 40,
            'category' => 'Laptops',
        ]));

        $this->assertDatabaseHas('services', [
            'type' => 'warranty',
            'deadline' => '365',
            'cost' => 40,
            'category' => 'Laptops',
        ]);
        $response->assertRedirect('/admin');
    }

    public function test_cannot_create_service_with_non_valid_data()
    {
        $this->post(route('service.store', [
            'type' => '',
            'deadline' => 'wef',
            'cost' => 'adsf',
            'category' => '',
        ]))
            ->assertSessionHasErrors(['type', 'deadline', 'cost', 'category'])
            ->assertStatus(302);
    }

    public function test_can_update_service()
    {
        $this->seed();
        $service = Service::limit(1)->get()[0];
        $id = $service->id;
        $response = $this->put(route('services.update', $id), [
            'id' => $id,
            'type' => 'warranty',
            'deadline' => 180,
            'cost' => 20,
            'category' => 'Laptops',
        ]);

        $this->assertDatabaseHas('services', [
            'type' => 'warranty',
            'deadline' => 180,
            'cost' => 20,
            'category' => 'Laptops',
        ]);
        $response->assertRedirect('/admin');
    }

    public function test_if_deleted()
    {
        $this->seed();
        $service = Service::limit(1)->get()[0];
        $id = $service->id;
        $this->delete(route('services.delete', $id));
        $this->assertDatabaseMissing('services', ['id' => $id]);
    }

}
