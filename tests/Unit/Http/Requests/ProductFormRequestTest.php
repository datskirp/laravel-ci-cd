<?php

namespace Tests\Unit\Http\Requests;

use App\Http\Requests\ProductFormRequest;
use PHPUnit\Framework\TestCase;

class ProductFormRequestTest extends TestCase
{
    public function test_contains_valid_rules()
    {
        $r = new ProductFormRequest();

        $this->assertEquals([
            'name' => 'string|required|max:255',
            'manufacturer' => 'string|required|max:255',
            'release' => 'date|required',
            'cost' => 'numeric|required',
            'category' => 'string|required|max:255',
        ], $r->rules());
    }
}
