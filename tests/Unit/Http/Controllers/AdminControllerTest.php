<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    public function test_index_can_return_view()
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertViewHas(['products', 'services']);
    }
}
