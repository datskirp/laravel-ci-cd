<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
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
        $servicesPrice = 0;
        if ($this->services) {
            foreach ($this->services as $service) {
                $servicesPrice += $service->cost;
            }
        }

        return $this->product->cost + $servicesPrice;
    }
}
