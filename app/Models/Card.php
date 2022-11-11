<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //use HasFactory;

    public $product;
    public $services = [];

    public function addProduct(Product $product)
    {
        $this->product = $product;
    }

    public function addService(Service $service)
    {
        $this->services[$service->id] = $service;
    }

    public function removeService(Service $service)
    {
        unset($this->services[$service->id]);
    }

    public function getTotalPrice()
    {
        $total = 0;
        if ($this->services) {
            foreach ($this->services as $service) {
                $total += $service->cost;
            }
        }
        return $this->product->cost + $total;
    }
}
