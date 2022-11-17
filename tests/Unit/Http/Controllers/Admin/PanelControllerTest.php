<?php

namespace Tests\Unit\Http\Controllers\Admin;

use Tests\TestCase;

class PanelControllerTest extends TestCase
{
    public function test_index_can_return_view()
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }
}
