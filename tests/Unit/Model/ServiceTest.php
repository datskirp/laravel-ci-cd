<?php

namespace Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use App\Models\Service;

class ServiceTest extends TestCase
{
    public function test_contains_valid_fillable_properties()
    {
        $s = new Service();
        $this->assertEquals(['type', 'deadline', 'cost', 'category'], $s->getFillable());
    }
}
