<?php

namespace Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    public function test_contains_valid_fillable_properties()
    {
        $p = new Product();
        $this->assertEquals(['name', 'manufacturer', 'release', 'cost', 'category'], $p->getFillable());
    }
}
